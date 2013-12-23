 <form role="form" method='POST' enctype="multipart/form-data" action='/users/profile_update/'>
				<!--<?php if($image): ?>
                    <img id="avatar" src="/uploads/avatars/<?= $user->image ?>" alt="<?=$user->first_name . ' ' . $user->last_name ?>">
            <?php else: ?>
                    <img id="avatar" src="/uploads/avatars/default_user.png">
            <?php endif; ?>-->


            <img id="avatar" src="/uploads/avatars/<?= $user->image ?>" alt="<?=$user->first_name . ' ' . $user->last_name ?>">                
            <div>
                   
                    <input type="file" name="avata" id="avata"> 
                    <?php if(isset($error)): ?>                   
                            <div class="messge error">Upload failed.<br> 
                            Image file must be a jpg, gif, or png.
                            </div>                
                    <?php endif; ?>
                    <button type="submit" id='update-image' class="btn btn-success">Update Image</button>
            </div>
</form>

