<?php $feedback = [
    [
        'id' => '1',
        'name' => '1name',
        'body' => '1body'
    ],
    [
        'id' => '2',
        'name' => '2name',
        'body' => '2body'
    ],
    [
        'id' => '3',
        'name' => '3name',
        'body' => '3body'
    ]
]; 
?>

<?php if(empty($feedback)){
    echo "No feedback";
}
?>
<?php foreach($feedback as $item):?>
    <?php echo $item['body'];?>
<?php endforeach;?>