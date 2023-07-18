<?php

//decodeDOI.php


require ('../includes/config.inc.php'); 
//require BASE_URI . '/pages/learning/includes/head.php';

$general = new general;

$user = new users;

function simpleXML_to_object($obj)
{
  $data = new StdClass();
    if(
		(is_object($obj) && get_class($obj) == 'SimpleXMLElement')
	)
	{
		/*
		 * Loop through the children
		 */
		if (count($obj->children()))
		{
			foreach ($obj as $key => $value)
			{
				/*
				 * If this is actually an array, treat it as such.
				 * This sort of thing is what makes simpleXML a pain to use.
				 */
				if (count($obj->$key) > 1)
				{
					if(!isset($data->$key) || !is_array($data->$key))
					{
						$data->$key = array();
					}
					array_push($data->$key, simpleXML_to_object($value));
				}
				else
				{
					$data->$key = simpleXML_to_object($value);
				}
			}
		}
		if (count($obj->attributes()))
		{
			foreach ($obj->attributes() as $key => $value)
			{
				$data->$key = (string) $value;
			}
		}
		/*
		 * If we have no attributes and no children, treat this as a string.
		 */
		if (count(get_object_vars($data)) == 0)
		{
			$data = (string) $obj;
		}
		elseif (strlen( (string) $obj ))
		{
			$data->value = (string) $obj;
		}
	}
	elseif (is_array($obj))
	{
		foreach($obj as $key => $value)
		{
			$data->$key = simpleXML_to_object($value);
		}
	}
	else {
		$data = (string) $obj;
	}
	return $data;
}

$data = json_decode(file_get_contents('php://input'), true);



if (count($data) > 0){

    if (!isset($data['DOI'])){

		$errors[] = 'DOI key not set';
		print_r($errors);
		exit();

	}else{

        $DOI = $data['DOI'];
        
        $DOI = urlencode($DOI);

    }
    


    libxml_use_internal_errors(true);
    //$myXMLData = file_get_contents('https://www.ncbi.nlm.nih.gov/pmc/utils/idconv/v1.0/?ids=' . $DOI);;

    $xml = simplexml_load_file('http://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id=' . $DOI . '&retmode=xml');
    if ($xml === false) {
    echo "Failed loading XML: ";
    foreach(libxml_get_errors() as $error) {
    echo "<br>", $error->message;
    }
    } else {

    //$xml2 = (string)$xml->xpath('//record//@attributes//doi');
    //print_r($xml);
    
    $dataObj = simpleXML_to_object($xml);
    
    //print_r($dataObj);
    
    try{
        $article = $dataObj->PubmedArticle->MedlineCitation;
    }catch(Exception $e){

        echo 'Caught exception: ',  $e->getMessage(), "\n";
        exit();

    }

    //print_r($article);

    $returnArray = array();

    foreach ($article->Article->ELocationID as $key=>$value){

        if ($value->EIdType == 'doi'){

            $doiFromPM = $value->value;

        }


    }

    $returnArray['DOI'] = $doiFromPM;
    
    $authors = '';
    $x = count($article->Article->AuthorList->Author);
    $y = 1;
    foreach ($article->Article->AuthorList->Author as $key=>$value){

        
        
        if ($y < $x){
        
            $authors .=  $value->LastName . ' ' . $value->Initials . ', ';

        }else{

            $authors .= $value->LastName . ' ' . $value->Initials;
        }
        $y++;

    }
    
    $returnArray['authors'] = $authors;



    $returnArray['journal'] = $article->Article->Journal->Title;
    $returnArray['journal'] .= ', ' . $article->Article->Journal->JournalIssue->PubDate->Year;
    $returnArray['journal'] .= ' vol. ' . $article->Article->Journal->JournalIssue->Volume;
    $returnArray['journal'] .= '(' . $article->Article->Journal->JournalIssue->Issue . ')';
    $returnArray['journal'] .= ' pp. ' . $article->Article->Pagination->MedlinePgn . '.';
   
   
    $returnArray['formatted'] = $article->Article->ArticleTitle;
    
    echo json_encode($returnArray);
    
    }

    }else{

    echo 'No variables passed';

    }

$general->endGeneral();
$user->endusers();


?>