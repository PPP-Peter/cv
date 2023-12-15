<?php
exec('rsync -avzh --exclude-from \'rsync-ignore\' -e "ssh -p 27645" .  uid2285296@shell.r2.websupport.sk:~/domena/sub/data');
