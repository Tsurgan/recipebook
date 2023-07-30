

<?php foreach ($recipes as $recipe_item): ?>

        <h3><?php echo $recipe_item['name'] ?></h3>
        <div><?php echo $recipe_item['steps'] ?></div>
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($recipe_item['photo']).'" width="100" height="100">'; ?>
       
    
<?php endforeach; ?>