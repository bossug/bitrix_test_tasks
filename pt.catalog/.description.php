<?
$arComponentDescription = array(
   "NAME" => GetMessage("COMP_NAME"),
   "DESCRIPTION" => GetMessage("COMP_DESCR"),
   "ICON" => "/images/catalog.gif",
   "COMPLEX" => "Y",
   "PATH" => array(
      "ID" => "content",
      "CHILD" => array(
         "ID" => "catalog",
         "NAME" => "Каталог товаров"
      )
   ),
   "CACHE_PATH" => "Y",
);
?>