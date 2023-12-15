<?php

namespace App\Utils\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaHelper
{
    /**
     * @param  Model  $model
     * @param $image
     * @param  string  $collectionName
     * @param  string|null  $modelType
     * @return Media
     */
    public static function addMedia(Model $model, $image, string $collectionName, string $modelType = null): Media
    {
        $imageName = Str::uuid()->toString();

        $media = Media::create([
            'model_type' => $modelType ?? get_class($model),
            'model_id' => $model->id,
            'collection_name' => $collectionName,
            'name' => pathinfo($imageName, PATHINFO_FILENAME),
            'file_name' => $imageName,
            'mime_type' => $image->getMimeType(),
            'disk' => 'public',
            'size' => $image->getSize(),
            'manipulations' => [],
            'custom_properties' => [],
            'generated_conversions' => [],
            'responsive_images' => [],
        ]);

        $imageUrl = Storage::disk('public')->put($media->id, $image);
        $image = ImageHelper::getParams($imageUrl);

        $media->update(['file_name' => $image['file_name'], 'name' => $image['name']]);

        return $media;
    }

    /**
     * @param  Model|JsonResource  $model
     * @param  string  $collectionName
     * @param  string|null  $modelType
     * @return Media|null
     */
    public static function getFirstMedia(Model|JsonResource $model, string $collectionName, string $modelType = null): Media|null
    {
        return Media::where(['model_type' => $modelType ?? get_class($model), 'model_id' => $model->id, 'collection_name' => $collectionName])->first();
    }

    /**
     * @param  Model|JsonResource  $model
     * @param  string  $collectionName
     * @param  string|null  $modelType
     * @return string|null
     */
    public static function getFirstMediaUrl(Model|JsonResource $model, string $collectionName, string $modelType = null): ?string
    {
        return self::getFirstMedia($model, $collectionName, $modelType)?->originalUrl;
    }

    /**
     * @param  Model|JsonResource  $model
     * @param  string  $collectionName
     * @param  string|null  $modelType
     * @return MediaCollection|null
     */
    public static function getMedia(Model|JsonResource $model, string $collectionName, string $modelType = null): MediaCollection|null
    {
        return Media::where(['model_type' => $modelType ?? get_class($model), 'model_id' => $model->id, 'collection_name' => $collectionName])->get();
    }

    public static function getMediaUrl(Model|JsonResource $model, string $collectionName, string $modelType = null)
    {
        $media = self::getMedia($model, $collectionName, $modelType);

        $urls = [];
        foreach ($media as $item) {
            $urls[] = $item['original_url'];
        }

        return $urls;
    }

    public static function removeMedia($media)
    {
        $media->forceDelete();
    }
}
