<?php

 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgButtonXtdbutton extends JPlugin {

    function plgButtonXtdbutton(& $subject, $config)
    {
        parent::__construct($subject, $config);
    }
    function onDisplay($name)
    {
        $js =  "function sampleXTDButtonClick(editor) {
			txt = prompt('Please enter ID','123');
			if (!txt) return;
			jInsertEditorText('{sampleplugin '+txt+'}', editor);
		}";
				
        $doc = & JFactory::getDocument();
        $doc->addScriptDeclaration($js);
		
        $button = new JObject;		
	$button->modal = false;
	$button->class = 'btn';
	$button->link = '#';
	$button->text = JText::_('Insert sampleplugin');
	$button->name = 'wand';
	$button->onclick = 'sampleXTDButtonClick(\''.$name.'\'); return false;';
		
        return $button;
    }
}
