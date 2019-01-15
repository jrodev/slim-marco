//Una vez la hayas descargado, haces el enlace
require_once 'directorio_de_libreria/'.'PHPExcel.php';
 
//Creas el objeto
$objPHPExcel   = new PHPExcel(); //Nuevo objeto excel para crear un archivo
 
//Aquí puedes modificar algunas propiedades del archivo que será creado
$objPHPExcel->getProperties()->setCreator("Creador");
$objPHPExcel->getProperties()->setLastModifiedBy("Ultima modificacion");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHPExcel classes.");
 
//Con ésta función puedes setear las columnas que irán de título
 
//Ajustas la celda al tamaño del texto
foreach( range('A','I') as $letra ){ //Recorremos las letras que iran en nuestro titulo
   $objPHPExcel->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
}
 
//Seteas los titulos
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Campo1');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Campo2');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Campo3');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Campo4');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Campo5');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Campo6');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Campo7');
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Campo8');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Campo9');
   
 
//Aqui comenzamos a escribir en el archivo excel, toma en cuenta que si decides poner columnas de titulo, debes empezar apartir del renglon #2, esto puede ir en una iteración, dependiendo de cuantos datos necesites, eso te lo dejo a ti ;)
 
$c = 2; //Numero de renglón
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$c, 'Codigo Renipres ');
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$c, 'Nombre Establecimiento');
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$c, 'Categoria del Establecimiento');
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$c, 'Institucion');
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$c, 'Diris');
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$c, 'Red');
$objPHPExcel->getActiveSheet()->SetCellValue('G'.$c, 'Microred');
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$c, 'N° de Camas');
$objPHPExcel->getActiveSheet()->SetCellValue('I'.$c, 'Categoria del Establecimiento');
 
//El nombre de la hoja en tu archivo excel
$objPHPExcel->getActiveSheet()->setTitle('Datos');
 
//Creamos el archivo
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('Desacargas/'.'Reporte1.xlsx');
echo "Archivo creado: ".$namexls;