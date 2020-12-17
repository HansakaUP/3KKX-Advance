<?php
include 'includes/autoloader.inc.php';

if (Input::exists()) {
    $validator = new Validator();
    $validation = $validator->check($_POST, $_FILES, array(
        'title' => array(
            'name' => 'Post title',
            'required' => true,
            'min' => 2,
            'max' => 255,
            'unique' => 'software'
        ),
        'name' => array(
            'name' => 'Software name',
            'required' => true,
            'min' => 2,
            'max' => 255,
            'unique' => 'software'
        ),
        'version' => array(
            'name' => 'Software version',
            'required' => true,
            'min' => 2,
            'max' => 20
        ),
        'description' => array(
            'name' => 'Description',
            'required' => true,
            'min' => 2,
            'max' => 1000
        ),
        'developer' => array(
            'name' => 'Developer name',
            'required' => true,
            'min' => 2,
            'max' => 255
        ),
        'category' => array(
            'name' => 'Category',
            'required' => true,
            'min' => 2,
            'max' => 30
        ),
        'image' => array(
            'name' => 'Main image',
            'required' => true,
            'filetype' => 'image/jpeg',
            'error' => 0,
            'maxsize' => 1000000
        ),
        'screenshots' => array(
            'name' => 'Screenshots',
            'required' => true,
            'filetype' => 'image/jpeg',
            'error' => 0,
            'imgcount' => 3,
            'maxsize' => 1000000
        ),
        'setup-name' => array(
            'name' => 'Setup name',
            'required' => true,
            'min' => 2,
            'max' => 255
        ),
        'setup-size' => array(
            'name' => 'Setup size',
            'required' => true,
            'min' => 2,
            'max' => 10
        ),
        'setup-type' => array(
            'name' => 'Setup type',
            'required' => true,
            'min' => 2,
            'max' => 255
        ),
        'architecture' => array(
            'name' => 'Architecture',
            'required' => true,
            'min' => 2,
            'max' => 10
        ),
        'release-date' => array(
            'name' => 'Release date',
            'required' => true,
            'checkdate' => true
        ),
        'os' => array(
            'name' => 'Operating system',
            'required' => true,
            'min' => 2,
            'max' => 255
        ),
        'ram' => array(
            'name' => 'RAM',
            'required' => true,
            'min' => 2,
            'max' => 10
        ),
        'space' => array(
            'name' => 'Space',
            'required' => true,
            'min' => 2,
            'max' => 10
        ),
        'processor' => array(
            'name' => 'Processor',
            'required' => true,
            'min' => 2,
            'max' => 255
        ),
        'torrent-link' => array(
            'name' => 'Torrent link',
            'required' => true,
            'min' => 2
        ),
        'direct-link' => array(
            'name' => 'Direct link',
            'required' => true,
            'min' => 2
        ),
        'crack-link' => array(
            'name' => 'Crack link',
            'required' => true,
            'min' => 2
        ),
        'upload-date' => array(
            'name' => 'Upload date',
            'required' => true,
            'checkdate' => true
        )
    ));

    if ($validation->passed()) {
        echo "Passed";
    } else {
        print_r(array_unique($validation->errors()));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" href="css/add.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Add Software - 3KKX Serials</title>
</head>
<body>

	<div class="wrapper">
        <nav class="main-nav">
            <ul>
                <li><a href="dashboard.php"><i class="fa fa-backward" aria-hidden="true"></i>Back</a></li>
                <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>View</a></li>
                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Admins</a></li>
                <li><a href="#"><i class="fa fa-flag" aria-hidden="true"></i>Requests</a></li>
                <li><a href="#"><i class="fa fa-check-circle" aria-hidden="true"></i>Registed</a></li>
            </ul>
        </nav>
        <form action="" method="post"  class="form-container" enctype="multipart/form-data">
            <div class="form-title">
                <h1>Add Software Details</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut quia alias fugiat neque dolorum a.</p>
            </div>
            <div class="form-item form-item-1">
            	<label for="">Post title:</label>
                <input type="text" name="title" value="<?php echo Input::get('title'); ?>" autocomplete="off">
            </div>
            <div class="form-item form-item-2">
            	<label for="">Name:</label>
                <input type="text" name="name" value="<?php echo Input::get('name'); ?>" autocomplete="off">
            </div>
            <div class="form-item form-item-3">
            	<label for="">Version:</label>
                <input type="text" name="version" value="<?php echo Input::get('version'); ?>" autocomplete="off">
            </div>
            <div class="form-item form-item-4">
            	<label for="">Description:</label>
                <textarea name="description" style="resize: none;"><?php echo Input::get('description'); ?></textarea>
            </div>
            <div class="form-item form-item-5">
            	<label for="">Developer:</label>
                <input type="text" name="developer" value="<?php echo Input::get('developer'); ?>">
            </div>
            <div class="form-item form-item-6">
            	<label for="">Category:</label>
                <select name="category">
                	<option value="Operating System" <?php if (Input::get('category') == "Operating System") { echo "selected"; } ?>>Operating System</option>
                	<option value="Graphic Design" <?php if (Input::get('category') == "Graphic Design") { echo "selected"; } ?>>Graphic Design</option>
                    <option value="Antivirus" <?php if (Input::get('category') == "Antivirus") { echo "selected"; } ?>>Antivirus</option>
                	<option value="Mod Apps" <?php if (Input::get('category') == "Mod Apps") { echo "selected"; } ?>>Mod Apps</option>
                	<option value="Games" <?php if (Input::get('category') == "Games") { echo "selected"; } ?>>Games</option>
                </select>
            </div>
            <div class="form-item form-item-7">
            	<label for="">Image:</label>
                <input type="file" name="image" accept="image/jpeg">
            </div>
            <div class="form-item form-item-8">
            	<label for="">Screenshots:</label>
                <input type="file" name="screenshots[]" accept="image/jpeg" multiple>
            </div>
            <div class="form-item form-item-9">
            	<label for="">Setup name:</label>
                <input type="text" name="setup-name" value="<?php echo Input::get('setup-name'); ?>">
            </div>
            <div class="form-item form-item-10">
            	<label for="">Setup size:</label>
                <input type="text" name="setup-size" value="<?php echo Input::get('setup-size'); ?>">
            </div>
            <div class="form-item form-item-11">
                <label for="">Setup type:</label>
                <input type="text" name="setup-type" value="<?php echo Input::get('setup-type'); ?>">
            </div>
            <div class="form-item form-item-12">
                <label for="">Architecture:</label>
                <input type="text" name="architecture" value="<?php echo Input::get('architecture'); ?>">
            </div>
            <div class="form-item form-item-13">
                <label for="">Release date:</label>
                <input type="date" name="release-date" value="<?php echo Input::get('release-date'); ?>">
            </div>
            <div class="form-item form-item-14">
                <label for="">Operating system:</label>
                <input type="text" name="os" value="<?php echo Input::get('os'); ?>">
            </div>
            <div class="form-item form-item-15">
                <label for="">RAM:</label>
                <input type="text" name="ram" value="<?php echo Input::get('ram'); ?>">
            </div>
            <div class="form-item form-item-16">
                <label for="">Space:</label>
                <input type="text" name="space" value="<?php echo Input::get('space'); ?>">
            </div>
            <div class="form-item form-item-17">
                <label for="">Processor:</label>
                <input type="text" name="processor" value="<?php echo Input::get('processor'); ?>">
            </div>
            <div class="form-item form-item-18">
                <label for="">Torrent link:</label>
                <input type="text" name="torrent-link" value="<?php echo Input::get('torrent-link'); ?>">
            </div>
            <div class="form-item form-item-19">
                <label for="">Direct link:</label>
                <input type="text" name="direct-link" value="<?php echo Input::get('direct-link'); ?>">
            </div>
            <div class="form-item form-item-20">
                <label for="">Crack link:</label>
                <input type="text" name="crack-link" value="<?php echo Input::get('crack-link'); ?>">
            </div>
            <div class="form-item form-item-21">
                <label for="">Upload date:</label>
                <input type="date" name="upload-date" value="<?php echo Input::get('upload-date'); ?>">
            </div>
            <div class="form-item form-item-22">
                <label for="">&nbsp;</label>
                <button type="submit" name="submit"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
            </div>
        </form>
        <footer>
        	<p>© <?php echo date("Y"); ?> SLHacker.com Creation</p>
        </footer>
    </div>	

</body>
</html>