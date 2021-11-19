<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Adoptable Pets</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<h1>Adoptable Pets</h1>
	<p class = "source">Source: <a href="https://catalog.data.gov/dataset/adoptable-pets" target="_blank">Data.gov</a></p>
	

<?php 
print ("<form method=\"post\" action=\"index.php\">\n<fieldset>\n");

/* Filter Animal_Type */ 
print ("<label>Animal Type</label><br>\n");
print ("<select name=\"type\">\n");

$types = [
	"allTypes" => "All",
	"dog" => "Dog",
	"cat" => "Cat",
	"bird" => "Bird",
	"livestock" => "Livestock",
	"other" => "Other",
];

if (isset($_POST['type']))
{
	switch($_POST['type'])
	{
		case 'dog':
			$filterType = 'Animal_Type LIKE \'DOG\'';
			break;
		case 'cat':
			$filterType = 'Animal_Type LIKE \'CAT\'';
			break;
		case 'bird':
			$filterType = 'Animal_Type LIKE \'BIRD\'';
			break;
		case 'livestock':
			$filterType = 'Animal_Type LIKE \'LIVESTOCK\'';
			break;
		case 'other':
			$filterType = 'Animal_Type LIKE \'OTHER\'';
			break;
		default:
			$filterType = 'Animal_Type LIKE \'%\'';
	}

	foreach ($types as $key => $value)
	{
		if ($_POST['type'] == $key)
		{
			print ("<option value=\"$key\" selected=\"selected\">$value</option>\n");
		}
		else
		{
			print ("<option value=\"$key\">$value</option>\n");
		}
	}
}
else
{
	$filterType = 'Animal_Type LIKE \'%\'';
	foreach ($types as $key => $value)
	{
		if ($key == 'allTypes')
		{
			print ("<option value=\"$key\" selected=\"selected\">$value</option>\n");
		}
		else
		{
			print ("<option value=\"$key\">$value</option>\n");
		}
	}
}
print ("</select><br>\n");


/*Filter Age_Months */
print ("<label>Age by Months</label><br>\n");
if (isset($_POST['ages']))
{
	/* set $ages to zero if the POST variable is invalid */
	if (filter_var($_POST['agesCount'], FILTER_VALIDATE_INT) === False)
	{
		$ages = 0;
	}
	else
	{
		$ages = $_POST['agesCount'];
	}

	if ($_POST['ages'] == 'minimum')
	{
		$filterAgesMin = 'Age_Months > '.$ages;
		print ("<input type=\"text\" name=\"agesCount\" value=\"".$ages."\"><br>\n");
		print ("<input type=\"radio\" name=\"ages\" value=\"minimum\" checked>minimum<br>\n");
		print ("<input type=\"radio\" name=\"ages\" value=\"maximum\">maximum<br>\n");
	}

	if ($_POST['ages'] == 'maximum')
	{
		$filterAgesMax = 'Age_Months < '.$ages;
		print ("<input type=\"text\" name=\"agesCount\" value=\"".$ages."\"><br>\n");
		print ("<input type=\"radio\" name=\"ages\" value=\"minimum\">minimum<br>\n");
		print ("<input type=\"radio\" name=\"ages\" value=\"maximum\" checked>maximum<br>\n");
	}
}
else
{
	print ("<input type=\"text\" name=\"agesCount\" value=\"0\"><br>\n");
	print ("<input type=\"radio\" name=\"ages\" value=\"minimum\" checked>minimum<br>\n");
	print ("<input type=\"radio\" name=\"ages\" value=\"maximum\">maximum<br>\n");
}


/*Filter Pet_Size */
print ("<label>Pet Size</label><br>\n");
if (isset($_POST['size']))
{
	if ($_POST['size'] == 'kitten')
	{
		$filterSize = 'Pet_Size LIKE \'KITTEN\'';
		print ("<input type=\"radio\" name=\"size\" value=\"kitten\" checked>KITTEN<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"small\">SMALL<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"medium\">MEDIUM<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"large\">LARGE<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"all\">ALL<br>\n");
	}
	
	if ($_POST['size'] == 'small')
	{
		$filterSize = 'Pet_Size LIKE \'SMALL\'';
		print ("<input type=\"radio\" name=\"size\" value=\"kitten\">KITTEN<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"small\" checked>SMALL<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"medium\">MEDIUM<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"large\">LARGE<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"all\">ALL<br>\n");
	}

	if ($_POST['size'] == 'medium')
	{
		$filterSize = 'Pet_Size LIKE \'MEDIUM\'';
		print ("<input type=\"radio\" name=\"size\" value=\"kitten\">KITTEN<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"small\">SMALL<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"medium\" checked>MEDIUM<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"large\">LARGE<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"all\">ALL<br>\n");
	}

	if ($_POST['size'] == 'large')
	{
		$filterSize = 'Pet_Size LIKE \'LARGE\'';
		print ("<input type=\"radio\" name=\"size\" value=\"kitten\">KITTEN<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"small\">SMALL<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"medium\">MEDIUM<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"large\" checked>LARGE<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"all\">ALL<br>\n");
	}
	
	if ($_POST['size'] == 'all')
	{
		$filterSize = 'Pet_Size LIKE \'%\'';
		print ("<input type=\"radio\" name=\"size\" value=\"kitten\">KITTEN<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"small\">SMALL<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"medium\">MEDIUM<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"large\">LARGE<br>\n");
		print ("<input type=\"radio\" name=\"size\" value=\"all\" checked>ALL<br>\n");
	}
}
else
{
	$filterSize = 'Pet_Size LIKE \'%\'';
	print ("<input type=\"radio\" name=\"size\" value=\"kitten\">KITTEN<br>\n");
	print ("<input type=\"radio\" name=\"size\" value=\"small\">SMALL<br>\n");
	print ("<input type=\"radio\" name=\"size\" value=\"medium\">MEDIUM<br>\n");
	print ("<input type=\"radio\" name=\"size\" value=\"large\">LARGE<br>\n");
	print ("<input type=\"radio\" name=\"size\" value=\"all\" checked>ALL<br>\n");
}


/*Filter Sex */
print ("<label>Sex</label><br>\n");
if (isset($_POST['sex']))
{
	if ($_POST['sex'] == 'male')
	{
		$filterSex = 'Sex LIKE \'MALE\'';
		print ("<input type=\"radio\" name=\"sex\" value=\"male\" checked>MALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"female\">FEMALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"neutered\">NEUTERED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"spayed\">SPAYED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"unknown\">UNKNOWN<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"all\">ALL<br>\n");
	}
	
	if ($_POST['sex'] == 'female')
	{
		$filterSex = 'Sex LIKE \'FEMALE\'';
		print ("<input type=\"radio\" name=\"sex\" value=\"male\">MALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"female\" checked>FEMALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"neutered\">NEUTERED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"spayed\">SPAYED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"unknown\">UNKNOWN<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"all\">ALL<br>\n");
	}
	
	if ($_POST['sex'] == 'neutered')
	{
		$filterSex = 'Sex LIKE \'NEUTERED\'';
		print ("<input type=\"radio\" name=\"sex\" value=\"male\">MALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"female\">FEMALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"neutered\" checked>NEUTERED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"spayed\">SPAYED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"unknown\">UNKNOWN<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"all\">ALL<br>\n");
	}
	
	if ($_POST['sex'] == 'spayed')
	{
		$filterSex = 'Sex LIKE \'SPAYED\'';
		print ("<input type=\"radio\" name=\"sex\" value=\"male\">MALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"female\">FEMALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"neutered\">NEUTERED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"spayed\" checked>SPAYED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"unknown\">UNKNOWN<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"all\">ALL<br>\n");
	}
	
	if ($_POST['sex'] == 'unknown')
	{
		$filterSex = 'Sex LIKE \'UNKNOWN\'';
		print ("<input type=\"radio\" name=\"sex\" value=\"male\">MALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"female\">FEMALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"neutered\">NEUTERED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"spayed\">SPAYED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"unknown\" checked>UNKNOWN<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"all\">ALL<br>\n");
	}
	
	if ($_POST['sex'] == 'all')
	{
		$filterSex = 'Sex LIKE \'%\'';
		print ("<input type=\"radio\" name=\"sex\" value=\"male\">MALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"female\">FEMALE<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"neutered\">NEUTERED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"spayed\">SPAYED<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"unknown\">UNKNOWN<br>\n");
		print ("<input type=\"radio\" name=\"sex\" value=\"all\" checked>ALL<br>\n");
	}

	
}
else
{
	$filterSex= 'Sex LIKE \'%\'';
	print ("<input type=\"radio\" name=\"sex\" value=\"male\">MALE<br>\n");
	print ("<input type=\"radio\" name=\"sex\" value=\"female\">FEMALE<br>\n");
	print ("<input type=\"radio\" name=\"sex\" value=\"neutered\">NEUTERED<br>\n");
	print ("<input type=\"radio\" name=\"sex\" value=\"spayed\">SPAYED<br>\n");
	print ("<input type=\"radio\" name=\"sex\" value=\"unknown\">UNKNOWN<br>\n");
	print ("<input type=\"radio\" name=\"sex\" value=\"all\" checked>ALL<br>\n");
} 

/* Image URLs 
<a href=$url>"Pet_Images">Petharbor.com</a> 

*/

print ("\n<input type=\"button\" onclick=\"window.location.replace('index.php')\" value=\"Reset\"><br>\n");
print ("<input type=\"submit\" value=\"Filter\">\n");
print ("</fieldset>\n</form>\n");

/*Final Query based on selected options. */
if (strlen($filterAgesMin) > 0)
{
	$finalQuery = 'SELECT * FROM Adoptable_Pets WHERE ('.$filterType.') AND ('.$filterAgesMin.') AND ('.$filterSize.') AND ('.$filterSex.')';
}
elseif (strlen($filterAgesMax) > 0)
{
	$finalQuery = 'SELECT * FROM Adoptable_Pets WHERE ('.$filterType.') AND ('.$filterAgesMax.') AND ('.$filterSize.') AND ('.$filterSex.')';
}
else
{
	$finalQuery = 'SELECT * FROM Adoptable_Pets WHERE ('.$filterType.') AND ('.$filterSize.') AND ('.$filterSex.')';
}

print "<!-- ".$finalQuery."; -->\n";


/* opening THE ACTUAL sqlite database file */
$dbfile = new PDO('sqlite:Adoptable_Pets.sqlite');

/* quering all records from the base */
$query = $dbfile->query($finalQuery);
$results = $query->fetchAll();

/* closing the access to the database file */
$dbfile = null;

$resultsCount = count($results);
if ($resultsCount <= 1)
{
	print("<p class=\"resultsCount\">$resultsCount result</p>\n");
}
else
{
	print("<p class=\"resultsCount\">$resultsCount results</p>\n");
}

print("<table>\n");
print("<tr><th>Animal Type</th><th>Age by Months</th><th>Pet Size</th><th>Breed</th><th>Color</th><th>Sex</th><th>Pet Images</th></tr>\n");


foreach ($results as $value)
{
	print("<tr>
	<td>".$value['Animal_Type']."</td>
	<td class=\"count\">".number_format($value['Age_Months'])."</td>
	<td>".$value['Pet_Size']."</td>
	<td>".$value['Breed']."</td>
	<td>".$value['Color']."</td>
	<td>".$value['Sex']."</td>
	<td>".$nestedData[] = '<a href="'.$value["Pet_Images"].'"target="_blank">Image Link</a>'."</td>
	</tr>\n");
}

print("</table>\n");
?>

</body>
</html>
