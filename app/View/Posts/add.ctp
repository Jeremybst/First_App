<h1>Ajouter un post</h1>
<?php
echo $this->Form->create('Post');
echo "<br>";
echo $this->Form->input('title');
echo "<br>";
echo $this->Form->input('body', array('rows' => '3'));
echo "<br>";
echo $this->Form->end('Sauvegarder le post');
 ?>
