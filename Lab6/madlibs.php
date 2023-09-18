<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['verb'] = $_POST['verb'];
$_SESSION['adjective'] = $_POST['adjective'];
$_SESSION['noun'] = $_POST['noun'];
$_SESSION['adverb'] = $_POST['adverb'];
$_SESSION['conjunction'] = $_POST['conjunction'];
?>
<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<title>Mad Libs</title>
	<style>
		label {display: block; margin: 10px}
	</style>
	<body>
		<h1>Mad Libs</h1>
		<form method="post" action="madlibs.php">
			<label>Name of person: 
				<input type="text" name="name" value="<?php echo $_SESSION['name']?>">
			</label>
			<label>Verb ending in "ing":
				<input type="text" name="verb" value="<?php echo $_SESSION['verb']?>">
			</label>
            <label>Adjective: 
                <input type="text" name="adjective" value="<?php echo $_SESSION['adjective']?>">
            </label>
            <label>Noun: 
                <input type="text" name="noun" value="<?php echo $_SESSION['noun']?>">
            </label>
            <label>Adverb ending in "ly": 
                <input type="text" name="adverb" value="<?php echo $_SESSION['adverb']?>">
            </label>
            <label>Conjunction: 
                <input type="text" name="conjunction" value="<?php echo $_SESSION['conjunction']?>">
            </label>	
			<input type="submit" value="Sentence 1" name="sentence">
			<input type="submit" value="Sentence 2" name="sentence">
            <input type="submit" value="Sentence 3" name="sentence">
		</form>
		<p>
		<?php 
		$sentence = $_POST['sentence'];
		$name = $_SESSION['name'];
		$verb = $_SESSION['verb'];
        $adjective = $_SESSION['adjective'];
        $noun = $_SESSION['noun'];
        $adverb = $_SESSION['adverb'];
        $conjunction = $_SESSION['conjunction'];

		if ($sentence == "Sentence 1") {
			echo "$name watches Judge Judy while $adverb $verb the $adjective cheese $conjunction fleeing from the $noun.";
            $sentence = $_SESSION['name']." watches Judge Judy while ".$_SESSION['adverb']." ".$_SESSION['verb']." the ". $_SESSION['adjective']." cheese ".$_SESSION['conjunction']." fleeing from the ".$_SESSION['noun'].".\n";
		}
		else if ($sentence == "Sentence 2") {
			echo "$name eats the $adjective $noun $conjunction $adverb $verb Judge Judy.";
            $sentence = $_SESSION['name']." eats the ".$_SESSION['adjective']." ".$_SESSION['noun']." ".$_SESSION['conjunction']." ".$_SESSION['adverb']." ".$_SESSION['verb']." Judge Judy.\n";
		}
        else if ($sentence == "Sentence 3") {
			echo "The $noun $verb from the $adjective tree $conjunction $name $adverb laughs out loud.";
            $sentence = $_SESSION['noun']." ".$_SESSION['verb']." from the ".$_SESSION['adjective']." tree ".$_SESSION['conjunction']." ".$_SESSION['name']." ".$_SESSION['adverb']." laughs out loud.\n";
		}
        $filename = "sentencedata.txt";
        $myfile = fopen($filename, "a");
        fwrite($myfile, $sentence);
        fclose($myfile);
		?>
		</p>
	</body>
</html>