<?php
    $content = "<div class='d-inline-block mr-1'>
<img class='taskEmployeeImg rounded-circle' src='".$user->image_url."' >
           </div>". htmlentities($user->userBadge());

  if($agent){
      $content .= ' ['.$user->email.'] ';
   }

   if($pill){
       $content = "<span class='badge badge-pill badge-light border'>".$content."</span>";
   }

?>

<option
    <?php echo e(!$selected ?: 'selected'); ?>

    data-content="<?php echo $content; ?>"
    value="<?php echo e($userID ?? $user->id); ?>">
    <?php echo e(mb_ucfirst($user->name)); ?>

</option>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/components/user-option.blade.php ENDPATH**/ ?>