<?php 

include('database_connection.php');


$EmailId="";
$Product_Name="";
$Region="";
$College_Name="";
$Branch="";
$Semester="";
$Subject="";
$Price="";
$Type="";
$Description="";


// $quantity=$_POST["quantity"];
$quantity=1;
while($quantity!=0){
    addProduct($quantity,$connect);
    $quantity--;
    if($quantity==0){
    }
}

function addProduct($n,$connect){
    if(0) {
        $output = false;
        echo $output;
    }else{
        $Product_Name=$_POST["Product_Name".$n.""];
        $Region=$_POST["Region".$n.""];
        $College_Name=$_POST["College_Name".$n.""];
        $Branch=$_POST["Branch".$n.""];
        $Semester=$_POST["Semester".$n.""];
        $Subject=$_POST["Subject".$n.""];
        $Price=$_POST["Price".$n.""];
        $Type=$_POST["Type".$n.""];
        $Description=$_POST["Description".$n.""];

        // Finding Product ID
        $query = "SELECT * from Products ORDER BY Product_Id DESC ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
    
        $maxID = $result[0]['Product_Id'];
        $maxID++; //new product ID

        // File upload path
        $targetDir = "../images/product/";
        $fileName = basename($_FILES["Product_Img".$n.""]["name"]);
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
        $newFileName = "prod_".$maxID.".".$fileType; 

        $targetFilePath = $targetDir .$newFileName; 
        
      

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            
            if(move_uploaded_file($_FILES["Product_Img".$n.""]["tmp_name"], $targetFilePath)){ 
                $uploadedFile = $newFileName; 
                $response['message'] = 1;
            }else{ 
                $uploadStatus = 0; 
                $response['message'] = 'Sorry, there was an error uploading your file.'; 
            } 
        }else{ 
            $uploadStatus = 0; 
            $response['message'] = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.'; 
        } 
    echo $response['message'];
       
        
        $query = "INSERT INTO `products` (Product_Id,Product_Img,Product_Name,Region,College_Name,Branch,Semester,Subject,Price,Type,Description) VALUES ('".$maxID."','".$uploadedFile."','".$Product_Name."','".$Region."','".$College_Name."','".$Branch."','".$Semester."','".$Subject."','".$Price."','".$Type."','".$Description."')";
        $statement = $connect->prepare($query);
        $statement->execute();
        
        
    }
}
?>