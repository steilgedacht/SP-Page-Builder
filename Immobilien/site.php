<?php

defined ('_JEXEC') or die ('Restricted access');

class SppagebuilderAddonImmobilien extends SppagebuilderAddons{

	public function render() {
		$settings = $this->addon->settings;
		$id = $this->addon->id;

		$aktiviert = (isset($settings->aktiviert) && $settings->aktiviert) ? $settings->aktiviert : 'nein';
		$titleheading = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$preis = (isset($settings->preis) && $settings->preis) ? $settings->preis : '';
		$wohnflache = (isset($settings->wohnflache) && $settings->wohnflache) ? $settings->wohnflache : '';
		$grundflache = (isset($settings->grundflache) && $settings->grundflache) ? $settings->grundflache : '';
		$customtitle = (isset($settings->customtitle) && $settings->customtitle) ? $settings->customtitle : '';
		$customnumber = (isset($settings->customnumber) && $settings->customnumber) ? $settings->customnumber : '';
		$anker = (isset($settings->anker) && $settings->anker) ? $settings->anker : '';

		$aktiv = '';
		if ($aktiviert != 'nein'){
			$aktiv = 'opacity: .6; pointer-events: none; background-image: url(images/verkauft.png)';
		}

		$tabs = "";

		$tabs .='<ul class="sppb-nav sppb-nav" role="tablist">';
		foreach ($settings->sp_tab_item as $key => $tab) {
            $title = (isset($tab->title) && $tab->title) ? ' '. $tab->title . ' ' : '';
            $tabs .='<li class="'. ( ($key==0) ? "active" : "").'">';
            $tabs .= '<a data-toggle="sppb-tab" id="sppb-content-'. ($this->addon->id + $key) .'" href="#sppb-tab-'. ($this->addon->id + $key) .'" role="tab" aria-controls="sppb-tab-'. ($this->addon->id + $key) .'" aria-selected="'. ( ($key==0) ? "true" : "false").'">'. $title . '</a>';
            $tabs .='</li>';
		}
		$tabs .='</ul>';

		$tabs .='<div class="sppb-addon-content sppb-tab sppb-tabs-tab sppb-tab-nav-left">';
		foreach ($settings->sp_tab_item as $key => $tab) {
            $tabs .='<div id="sppb-tab-'. ($this->addon->id + $key) .'" class="sppb-tab-pane sppb-fade'. ( ($key==0) ? " active in" : "").'" role="tabpanel" aria-labelledby="sppb-content-'. ($this->addon->id + $key) .'">' . $tab->content .'</div>';
		}
		$tabs .='</div>';

		$output = '<div class="Immobilien" style="' . $aktiv . '" id=' . $anker . '>';
		
		$output .= '<h2>' . $titleheading . '</h2>';
		$output .= '
					<div class="irow">
						<div class="icolumn">
							<div class="slideshow-container' . $this->addon->id . '">';

		foreach ($settings->sp_tab_image as $key => $slide) {
			$image = (isset($slide->image) && $slide->image) ? $slide->image : '';
			$image_src = isset($image->src) ? $image->src : $image;
			$output .= '<div class="mySlides' . $this->addon->id . ' fade">
							<img src="' . $image_src . '">
						</div>';
		}		
		$output .= '
								<a class="prev' . $this->addon->id . '" onclick="plusSlides' . $this->addon->id . '(-1)">&#10094;</a>
								<a class="next' . $this->addon->id . '" onclick="plusSlides' . $this->addon->id . '(1)">&#10095;</a>
							</div>';			

		$output .= '
							<div class="Infobox">
								<a href="index.php/immobilie-anfragen#' . str_replace(" ", "-", $titleheading) . '" target="_blank" class="sppb-btn sppb-btn-primary sppb-btn-rounded immobilienbutton" style="float:right;">Mehr erfahren</a>
								<table>';
		$output .= ($preis != '') ? '<tr><td>Preis</td><td>€ ' . $preis . '</td></tr>' : '';
		$output .= ($wohnflache != '') ? '<tr><td>Wohnfläche</td><td>' . $wohnflache . ' m²</td></tr>' : '';
		$output .= ($grundflache != '') ? '<tr><td>Grundfläche</td><td>' . $grundflache . ' m²</td></tr>' : '';
		$output .= ($customnumber != '') ? '<tr><td>' . $customtitle .'</td><td>' . $customnumber . '</td></tr>' : '';
		$output .= '									
								</table>
							</div>	
						</div>	
						<div class="icolumn">
							<h4>Objektbeschreibung</h4>
							<div style="background-color: #efefef;">
								<div>' . $tabs . '</div>
							</div>
						</div>
					</div>';

		$output .= '</div>';
		$output .= '<script>
						var slideIndex' . $this->addon->id . ' = 1;
						showSlides' . $this->addon->id . '(slideIndex' . $this->addon->id . ');

						function plusSlides' . $this->addon->id . '(n) {
							showSlides' . $this->addon->id . '(slideIndex' . $this->addon->id . ' += n);
						}

						function currentSlide' . $this->addon->id . '(n) {
							showSlides' . $this->addon->id . '(slideIndex' . $this->addon->id . ' = n);
						}

						function showSlides' . $this->addon->id . '(n) {
							var i;
							var slides = document.getElementsByClassName("mySlides' . $this->addon->id . '");
							if (n > slides.length) {slideIndex' . $this->addon->id . ' = 1}
							if (n < 1) {slideIndex' . $this->addon->id . ' = slides.length}
							for (i = 0; i < slides.length; i++) {
								slides[i].style.display = "none";
							}
							slides[slideIndex' . $this->addon->id . '-1].style.display = "block";
						}
					</script>';
		return $output;
	}


	public function css() {
		$settings = $this->addon->settings;

		$css = '
.irow {
	display: flex;
}
	
.icolumn {
	flex: 50%;
	padding-right: 20px;
}
.Immobilien .sppb-nav>li>a {
    width: max-content;
    float: left;
	color: black;
	margin-bottom: 20px;
	font-size: 14px;
    margin: 0px;
}
.Immobilien .sppb-nav>li.active>a {
    background-color: #fff;
	color: black;
}
.Immobilien .sppb-tab-pane.sppb-fade{
    display: none;
}
.Immobilien .sppb-tab-pane.sppb-fade.in  {
    display: unset;
}
.Immobilien .sppb-nav>li {
    width: max-content;
    float: left;
	font-family: \'Montserrat\';
    font-weight: 500;
}
.Immobilien td{
	width: 160px;
}
.Immobilien .sppb-nav-tabs {
    border-bottom: 1px solid #e5e5e5;
}
.Immobilien .sppb-nav-tabs>li>a {
    font-size: 14px;
    font-weight: bolder;
    line-height: 1.42857143;
    padding: 12px 15px;
    background: #f5f5f5;
    border: 1px solid #e5e5e5;
    border-right-width: 0;
}
.Immobilien .sppb-addon-content.sppb-tab.sppb-tabs-tab.sppb-tab-nav-left{
	padding:20px;
}
.Infobox{
	background-color: #c7d331;
    color: white;
    padding: 20px;
    font-family: \'Montserrat\';
    font-weight: 600;
    font-size: 18px;
}
.immobilienbutton{
	border-color: #a7b128;
    background-color: #5c602a;
    margin-top: 21px;
    border-radius: 0px;
    font-size: 20px;
    font-weight: 500;
}
@media (max-width:767px){
	.irow{
         flex-direction: column;
    }
    .icolumn {
      margin-bottom: 30px;
      padding: 0px;
    }
    .immobilienbutton{
      width: 100%;
      float: unset;
      margin: 0px;
      margin-bottom: 20px;
    }
}

.Immobilien .fade:not(.show) {
    opacity: 1 !important;
}

/* Slideshow container */
.slideshow-container' . $this->addon->id . ' {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides' . $this->addon->id . ' {
  display: none;
}

/* Next & previous buttons */
.prev' . $this->addon->id . ', .next' . $this->addon->id . ' {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next' . $this->addon->id . ' {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev' . $this->addon->id . ':hover, .next' . $this->addon->id . ':hover {
  background-color: rgba(0,0,0,0.8);
}
	';
		return $css;
	}

	public static function getTemplate() {
		$output = '<h1>{{data.title}}</h1>
        <p>{{data.preis}}<br>{{data.wohnflache}}<br>{{data.grundflache}}</p>
        ';
        return $output;
	}

}
