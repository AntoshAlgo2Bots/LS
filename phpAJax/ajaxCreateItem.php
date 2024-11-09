<?php


session_start();
include("../dbconnection/db.php");






if ($_SERVER['REQUEST_METHOD'] == 'POST') {







    if (isset($_POST['create_items_to_main'])) {



        $items_to_main = $_POST['items_to_main'];











        foreach ($items_to_main as $key => $value) {


            $sql = "SELECT * FROM item_master_temp  where item_code ='$value';	";



            $result = mysqli_query($con, $sql);


            $row = mysqli_fetch_assoc($result);



            $item_code = $row['item_code'];
            $Item_Category = $row['Item_Category'];
            $item_name = $row['item_name'];
            $subCatId = $row['subCatId'];
            $Price = $row['Price'];
            $SI_unit = $row['SI_unit'];
            $material = $row['Material'];
            $Design = $row['Design'];
            $item_type = $row['item_type'];
            $Half_Full_Thread = $row['Half_Full_Thread'];
            $Holder_Thread = $row['Holder_Thread'];
            $Holder_type = $row['Holder_type'];
            $Thread = $row['Thread'];
            $brand = $row['Brand'];
            $Light_Output_colour = $row['Light_Output_colour'];
            $Colour = $row['Colour'];
            $Cut = $row['Cut'];
            $Height = $row['Height'];
            $Length = $row['Length'];
            $Breadth = $row['Breadth'];
            $Upper_Dia = $row['Upper_Dia'];
            $Bottom_Dia = $row['Bottom_Dia'];
            $Centre_Hole_dia = $row['Centre_Hole_dia'];
            $Size = $row['Size'];
            $Watt = $row['Watt'];
            $Shape = $row['Shape'];
            $Side_Hole_dia = $row['Side_Hole_dia'];
            $Top_hole_dia = $row['Top_hole_dia'];
            $No_of_ply = $row['No_of_ply'];
            $Style = $row['Style'];
            $Thickness = $row['Thickness'];
            $Weight = $row['Weight'];
            $Depth = $row['Depth'];
            $Bottom_hole_dia = $row['Bottom_hole_dia'];
            $Core = $row['Core'];
            $Inner_Outer_thread = $row['Inner_Outer_thread'];
            $Upper_thread = $row['Upper_thread'];
            $Lower_thread = $row['Lower_thread'];
            $Thread_length = $row['Thread_length'];
            $Indian_Imported = $row['Indian_Imported'];
            $In_built_switch = $row['In_built_switch'];
            $Wire_type = $row['Wire_type'];
            $Vendor = $row['Vendor'];
            $attribute1 = $row['attribute1'];
            $attribute2 = $row['attribute2'];
            $attribute3 = $row['attribute3'];
            $imagePath = $row['imagePath'];
            $Long_Description = $row['Long_Description'];
            $Pintop = $row['Pintop'];
            $Discount = $row['Discount'];
            $fabric = $row['fabric'];
            $fabric_colour = $row['fabric_colour'];
            $piping = $row['piping'];
            $piping_color = $row['piping_color'];
            $piping_length = $row['piping_length'];
            $Lining = $row['Lining'];
            $Lining_colour = $row['Lining_colour'];
            $acrylic_sheet = $row['acrylic_sheet'];
            $gallery = $row['gallery'];
            $Gallery_type = $row['Gallery_type'];
            $powder_coating = $row['powder_coating'];
            $gallery_height = $row['gallery_height'];
            $sheet_color = $row['sheet_color'];
            $Frame = $row['Frame'];
            $departement = $row['departement'];
            $Transparent = $row['Transparent'];
            $colour_temparature = $row['colour_temparature'];
            $Dimmable = $row['Dimmable'];
            $Collar = $row['Collar'];
            $Socket = $row['Socket'];
            $Ink_type = $row['Ink_type'];
            $Location = $row['Location'];
            $createdBy = $_SESSION['username'];
            $createdDate = date('Y-m-d H:i:s');
            $itemStatus = $row['itemStatus'];
            $Diameter = $row['Diameter'];

























            $sql = "INSERT into item_master_main (item_code,
Item_Category,
item_name,
subCatId,
Price,
SI_unit,
material,
Design,
item_type,
Half_Full_Thread,
Holder_Thread,
Holder_type,
Thread,
brand,
Light_Output_colour,
Colour,
Cut,
Height,
Length,
Breadth,
Upper_Dia,
Bottom_Dia,
Centre_Hole_dia,
Size,
Watt,
Shape,
Side_Hole_dia,
Top_hole_dia,
No_of_ply,
Style,
Thickness,
Weight,
Depth,
Bottom_hole_dia,
Core,
Inner_Outer_thread,
Upper_thread,
Lower_thread,
Thread_length,
Indian_Imported,
In_built_switch,
Wire_type,
Vendor,
attribute1,
attribute2,
attribute3,
imagePath,
Long_Description,
Pintop,
Discount,
fabric,
fabric_colour,
piping,
piping_color,
piping_length,
Lining,
Lining_colour,
acrylic_sheet,
gallery_height,
gallery,
Gallery_type,
sheet_color,
powder_coating,
departement,
Transparent,
colour_temparature,
Dimmable,
Collar,
Socket,
Ink_type,
Location,
createdBy,
createdDate,
itemStatus,
Diameter

) 
values ('$item_code',
'$Item_Category',
'$item_name',
'$subCatId',
'$Price',
'$SI_unit',
'$material',
 '$Design' ,
'$item_type',
'$Half_Full_Thread',
'$Holder_Thread',
'$Holder_type',
'$Thread',
'$brand',
'$Light_Output_colour',
'$Colour',
'$Cut',
'$Height',
'$Length',
'$Breadth',
'$Upper_Dia' ,
'$Bottom_Dia',
'$Centre_Hole_dia',
'$Size',
'$Watt',
'$Shape',
'$Side_Hole_dia',
'$Top_hole_dia',
'$No_of_ply',
'$Style',
'$Thickness',
'$Weight',
'$Depth',
'$Bottom_hole_dia',
'$Core',
'$Inner_Outer_thread',
'$Upper_thread',
'$Lower_thread',
'$Thread_length',
'$Indian_Imported',
'$In_built_switch',
'$Wire_type',
'$Vendor',
'$attribute1',
'$attribute2',
'$attribute3',
'$imagePath',
'$Long_Description',
'$Pintop',
'$Discount',
'$fabric',
'$fabric_colour',
'$piping',
'$piping_color',
'$piping_length',
'$Lining',
'$Lining_colour',
'$acrylic_sheet',
'$gallery_height',
'$gallery',
'$Gallery_type',
'$sheet_color',
'$powder_coating',
'$departement',
'$Transparent',
'$colour_temparature',
'$Dimmable',
'$Collar',
'$Socket',
'$Ink_type',
'$Location',
'$createdBy',
'$createdDate',
'$itemStatus',
'$Diameter'
)";









            $result = mysqli_query($con, $sql);







                if($result){


                    $response['succcess']=true;
                    $response['message']="item succes fully creted and approves success fully ";
                    
                    
                }else{
                    
                    
                    $response['succcess']=false;
                    $response['message']="error while crerating and approving the item ";
                    $response['error']=mysqli_error($con);




                }





                echo json_encode($response);





        }




















    }




}

























?>