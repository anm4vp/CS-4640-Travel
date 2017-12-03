<?php


  $destination = array("Hawaii" => "Hawaii - United States. Price: $2000",
                     "Machu Pichu" => "Machu Pichu - Peru. Price: $1500",
                     "Grand Canyon" => "The Grand Canyon - Arizona, US. Price: $400",
                     "Pyramids of Giza" => "Pyramids of Giza - Giza, Egypt. Price: $5000",
                     "Eiffel Tower" => "Eiffel Tower - Paris, France. Price: $4000"
                     );
  
   $post_date = file_get_contents("php://input");
   $data = json_decode($post_date);               
    if (array_key_exists($data->res, $destination))
      print $destination[$data->res];
    else
      print "No Results";
?>