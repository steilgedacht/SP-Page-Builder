<?php

defined ('_JEXEC') or die ('Restricted access');

SpAddonsConfig::addonConfig(
array(
	'type'=>'content',
	'addon_name'=>'Immobilien',
	'title'=>'Immobilien',
	'category'=>'Content',
	'attr'=>array(
		'general' => array(
			'admin_label'=>array(
				'type'=>'text',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
				'std'=> ''
			),

			'anker'=>array(
				'type'=>'text',
				'title'=>'Ankerpunkt',
				'std'=>'200'
			),

			'aktiviert'=>array(
				'type'=>'select',
				'title'=>'Ist die Immobilie schon verkauft?',
				'values'=>array(
					'ja'=>'ja',
					'nein'=>'nein',
				),
				'std'=>'nein',
			),

			'title'=>array(
				'type'=>'text',
				'title'=>'Überschrift',
				'std'=>'Immobilie'
			),

			'sp_tab_image' => array(
				'title' => JText::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEMS'),
				'attr' => array(
					'title' => array(
						'type' => 'text',
						'title' => 'Admin label',
						'std' => 'Image'
					),
					'image'=>array(
						'type'=>'media',
						'title'=>'Foto',
						'show_input' => true,
						'std'=> array(
							'src' => 'images/startseite/dsc8436-768x512.jpg',
							'height' => '',
							'width' => '',
						)
					),
				),
			),			

			'preis'=>array(
				'type'=>'number',
				'title'=>'Preis [€]',
				'std'=>'100000'
			),

			'wohnflache'=>array(
				'type'=>'number',
				'title'=>'Wohnfäche [m²]',
				'std'=>'100'
			),

			'grundflache'=>array(
				'type'=>'number',
				'title'=>'Grundfläche [m²]',
				'std'=>'200'
			),

			'customtitle'=>array(
				'type'=>'text',
				'title'=>'Benutzerdefinierter Titel für eigenes Feld',
				'std'=>'200'
			),	

			'customnumber'=>array(
				'type'=>'text',
				'title'=>'Benutzerdefinierter Text für eigenes Feld',
				'std'=>'200'
			),	

			'sp_tab_item' => array(
				'title' => JText::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEMS'),
				'attr' => array(
					'title' => array(
						'type' => 'text',
						'title' => JText::_('COM_SPPAGEBUILDER_ADDON_TAB_ITEM_TITLE'),
						'std' => 'Tab'
					),
					'content' => array(
						'type' => 'editor',
						'title' => 'Text',
						'std' => 'Tab'
					),
				),
			),
		),
	),
	)
);
