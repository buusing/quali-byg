<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
  public function getHeroText(){
    $content['text'] = get_field('hero_text');
    $content['subtext '] = get_field('hero_subtext');
    return $content;

  }
  public function getHeroButtons(){
    if(count(get_field('buttons')) > 0 ) {
      return get_field('buttons');
    }
  }

  public function getTeamSections(){
    return get_field('text_and_image');
  }
}
