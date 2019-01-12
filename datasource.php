<?php

require 'lib/Kendo/Autoload.php';

 $transport = new \Kendo\Data\DataSourceTransport();
 
   $create = new \Kendo\Data\DataSourceTransportCreate();
 
   $create->url('contacts.php?type=create')
           ->contentType('application/json')
           ->type('POST');
  
    $read = new \Kendo\Data\DataSourceTransportRead();

    $read->url('contacts.php?type=read')
         ->contentType('application/json')
         ->type('POST');
 
    $update = new \Kendo\Data\DataSourceTransportUpdate();

    $update->url('contacts.php?type=update')
           ->contentType('application/json')
           ->type('POST');

    $destroy = new \Kendo\Data\DataSourceTransportDestroy();

    $destroy->url('contacts.php?type=destroy')
            ->contentType('application/json')
            ->type('POST');
            
    // Configure DataSource transport utility
            
    $transport->create($create)
              ->read($read)
              ->update($update)
              ->destroy($destroy)
              ->parameterMap('function(data) {
                  return kendo.stringify(data);
              }');
               
    // Configure the model
    
    $model = new \Kendo\Data\DataSourceSchemaModel();
    
    $contactIDField = new \Kendo\Data\DataSourceSchemaModelField('id');
    
    $contactIDField->type('number')
                   ->editable(false)
                   ->nullable(true);
                      
    $contactNameField = new \Kendo\Data\DataSourceSchemaModelField('name');
    $contactNameField->type('string')
                     ->validation(array('required' => true));
    
    $contactJobField = new \Kendo\Data\DataSourceSchemaModelField('job');
    $contactJobField->type('string')
                     ->validation(array('required' => true));
    
    $contactEmployerField = new \Kendo\Data\DataSourceSchemaModelField('employer');
    $contactEmployerField->type('string')
                         ->validation(array('required' => true));
    
    $contactEmailField = new \Kendo\Data\DataSourceSchemaModelField('email');
    $contactEmailField->type('string')
                      ->validation(array('required' => true,'email' => true));
    
    $contactPhoneField = new \Kendo\Data\DataSourceSchemaModelField('phone');
    $contactPhoneField->type('string')
                     ->validation(array('required' => true));
    
    $contactFaxField = new \Kendo\Data\DataSourceSchemaModelField('fax');
    $contactFaxField->type('string')
                     ->validation(array('required' => true));
    
    $contactMobileField = new \Kendo\Data\DataSourceSchemaModelField('mobile');
    $contactMobileField->type('string')
                         ->validation(array('required' => true));
    
    $contactAddressField = new \Kendo\Data\DataSourceSchemaModelField('address');
    $contactAddressField->type('string')
                      ->validation(array('required' => true));
                      
    $contactStateField = new \Kendo\Data\DataSourceSchemaModelField('state');
    $contactStateField->type('string')
                      ->validation(array('required' => true));
    
    
	 $model->id('id')
		   ->addField($contactIDField)
		   ->addField($contactNameField) 
		   ->addField($contactJobField)
		   ->addField($contactEmployerField)
		   ->addField($contactEmailField) 
		   ->addField($contactPhoneField)
		   ->addField($contactFaxField) 
		   ->addField($contactMobileField) 
		   ->addField($contactAddressField)  
		   ->addField($contactStateField); 
          
      
    $schema = new \Kendo\Data\DataSourceSchema();

    $schema->model($model);

    $dataSource = new \Kendo\Data\DataSource();

    // Configure data source - set transport, schema and enable batch mode
    $dataSource->transport($transport)
               ->pageSize(20)
               ->batch(true)
               ->schema($schema);     
         
           
?>


