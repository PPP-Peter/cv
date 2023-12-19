<?php
exec('rsync -avzh --exclude-from \'rsync-ignore\' -e "ssh -p 25762" .  uid2236072@shell.r2.websupport.sk:~/areaweb.sk/sub/cv');
