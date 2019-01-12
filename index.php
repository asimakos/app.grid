
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Επαφές Πολιτικής Προστασίας</title>
	<link rel="stylesheet" type="text/css" href="static/kendo.common.min.css">
	<link rel="stylesheet" type="text/css" href="static/kendo.default.min.css">
	<script src="static/jquery.min.js"></script>
	<script src="static/kendo.all.min.js"></script>
	<script src="static/jszip.min.js"></script>
	<script src="static/kendo.web.min.js"></script>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	
</head>

<body>
	
<?php

 require 'datasource.php';
 
    $grid = new \Kendo\UI\Grid('grid');

    $contactName = new \Kendo\UI\GridColumn();
    $contactName->field('name')
                 ->title('ONOMA');
  
    $contactJob = new \Kendo\UI\GridColumn();
    $contactJob->field('job')
                 ->title('ΘΕΣΗ');
    
    $contactEmployer = new \Kendo\UI\GridColumn();
    $contactEmployer->field('employer')
                    ->title('ΥΠΗΡΕΣΙΑ');
  
    $contactEmail = new \Kendo\UI\GridColumn();
    $contactEmail->field('email')
                 ->title('EMAIL');
                 
    $contactPhone = new \Kendo\UI\GridColumn();
    $contactPhone->field('phone')
                 ->editor('phoneMaskEditor')
                 ->title('ΤΗΛΕΦΩΝΟ');
  
    $contactFax = new \Kendo\UI\GridColumn();
    $contactFax->field('fax')
                ->editor('faxMaskEditor') 
                ->title('ΦΑΞ');
    
    $contactMobile = new \Kendo\UI\GridColumn();
    $contactMobile->field('mobile')
                  ->editor('mobileMaskEditor')
			      ->title('KINHTO');
  
    $contactAddress = new \Kendo\UI\GridColumn();
    $contactAddress->field('address')
                   ->title('ΔΙΕΥΘΥΝΣΗ');
    
    $contactState = new \Kendo\UI\GridColumn();
    $contactState->field('state')
                 ->title('NOMOΣ');
                 
    
    $command = new \Kendo\UI\GridColumn();
    $command->addCommandItem('destroy')
            ->title('&nbsp;')
            ->width(100);
            
    $gridFilterable = new \Kendo\UI\GridFilterable();
    $gridFilterable->mode("row"); 
    
    //Excel UI Settings
    
    $excel = new \Kendo\UI\GridExcel();
    $excel->fileName('Επαφές Πολιτικής Προστασίας.xlsx')
      ->filterable(true)
      ->proxyURL('excel-export.php?type=save');
    
    //PDF UI Settings
      
    $margin = new \Kendo\UI\GridPdfMargin();
    $margin->top("2cm")
       ->left("1cm")
       ->right("1cm")
       ->bottom("1cm");
       
    $pdf = new \Kendo\UI\GridPdf();
	$pdf->allPages(true)
	    ->avoidLinks(true)
	    ->paperSize("A4")
	    ->margin($margin)
	    ->landscape(true)
	    ->repeatHeaders(true)
	    ->templateId("page-template")
	    ->scale(0.8)
	    ->fileName('Επαφές Πολιτικής Προστασίας.pdf')
	    ->proxyURL('pdf-export.php?type=save');
   
              
    //Grid UI Settings
                    
    $grid->addColumn($contactName,$contactJob,$contactEmployer,$contactEmail,$contactPhone,$contactFax,$contactMobile,$contactAddress,$contactState,$command)
         ->addToolbarItem(new \Kendo\UI\GridToolbarItem('excel'))
         ->excel($excel)
         ->addToolbarItem(new \Kendo\UI\GridToolbarItem('pdf'))
         ->pdf($pdf)
         ->dataSource($dataSource)
         ->scrollable(true)
         ->groupable(true)
         ->reorderable(true)
         ->resizable(true)
          ->columnMenu(true)
         ->filterable(true)
         ->sortable(true)
         ->pageable(true)
         ->addToolbarItem(new \Kendo\UI\GridToolbarItem('create'),
            new \Kendo\UI\GridToolbarItem('save'), new \Kendo\UI\GridToolbarItem('cancel'))
         ->editable(true)
         ->height(400);
              
    echo $grid->render();          
?>

<script type="x/kendo-template" id="page-template">
  <div class="page-template">
    <div class="footer">
      Page #: pageNum # of #: totalPages #
    </div>
  </div>
</script>

<script>

 function phoneMaskEditor(container,options) {
 
  $('<input data-text-field="phone" data-value-field="phone" data-bind="value:' + options.field + '"/>')
      .appendTo(container)
      .kendoMaskedTextBox({
         mask:"(0000)-000000",
         value:options.model.phone
         });

 }
 
  function faxMaskEditor(container,options) {
 
  $('<input data-text-field="fax" data-value-field="fax" data-bind="value:' + options.field + '"/>')
      .appendTo(container)
      .kendoMaskedTextBox({
         mask:"(0000)-000000",
         value:options.model.fax
         });

 }
 
  function mobileMaskEditor(container,options) {
 
  $('<input data-text-field="mobile" data-value-field="mobile" data-bind="value:' + options.field + '"/>')
      .appendTo(container)
      .kendoMaskedTextBox({
         mask:"(00)-00000000",
         value:options.model.mobile
         });

 }

</script>

</body>

</html>
