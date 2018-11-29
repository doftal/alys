<?php

header('Content-Type: text/html; charset=utf-8');
ini_set("user_agent","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36");


include('simple_html_dom.php');
$html = new simple_html_dom();

$context = stream_context_create
(
	array
	(
		'http' => array
		(
			'method'  => 'GET',
			/*			'max_redirects' => 10,*/
			'follow_location' => false
		)
	)
);

$html = new simple_html_dom();

/*$html->load_file("http://www.nrj.fr/");

$track = $html->find('p.controlPanel-track', 0)->plaintext;
$artist = $html->find('p.controlPanel-artist', 0)->plaintext;
$img['thumb']  = $html->find('img.controlPanel-img', 0)->src;

echo $track . "|" . $artist . "|" . $img['thumb'];*/


$actionget = isset($_GET['action']) ? $_GET['action'] : '';

if (empty($actionget)) die("INVALID_ACTION");

try 
{
	switch (strtolower($actionget))
	{
		case 'nrj':
		$i = 0;
		$html->load_file("http://www.nrj.fr/webradios/banner", false, $context);
		foreach($html->find('*[class="controlPanel-track"], *[class="controlPanel-artist"]') as $station)
		{
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'fun radio':
		$html->load_file("https://www.funradio.fr/direct", false, $context);
		foreach($html->find('*[class="live-player__header__data__title"], *[class="live-player__header__data__details"]') as $station)
		{
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'europe 1':
		$html->load_file("http://www.europe1.fr/direct-audio", false, $context);
		foreach($html->find('*[class="horaire"], *[class="animateur"]') as $station)
		{
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'radio fg':
		$i = 0;
		$html->load_file("https://www.radiofg.com/", false, $context);
		foreach($html->find('*[class="ckoi_song"], *[class="ckoi_artist"]') as $station)
		{   

			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'rtl':
		$html->load_file("https://www.rtl.fr/direct", false, $context);
		foreach($html->find('*[class="live-player__header__data__title"], *[class="live-player__header__data__desc"]') as $station)
		{   
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'rtl2':
		$html->load_file("https://www.rtl2.fr/direct", false, $context);
		foreach($html->find('*[class="live-player__header__data__title"], *[class="live-player__header__data__desc"]') as $station)
		{   
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'radio latina':
		$html->load_file("http://www.latina.fr/", false, $context);
		$i = 0;
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'radio orient':
		$html->load_file("https://www.radioorient.com/", false, $context);
		$i = 0;
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

/*		case 'rfm':
		$html->load_file("http://www.rfm.fr/player", false, $context);
		foreach($html->find('*[class="live-flux default-flux"]') as $station) 
		{   
			echo $station->plaintext . "|";
		}
		break;*/

		case 'rire et chansons':
		$html->load_file("http://www.rireetchansons.fr/", false, $context);
		foreach($html->find('*[class="controlPanel-artist"], *[class="controlPanel-track"]') as $station) 
		{   
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'rmc':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-rmc", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'swigg':
		$i = 0;
		$html->load_file("http://www.swigg.fr/", false, $context);
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station) 
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'mfm radio':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-mfm", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'nostalgie':
		$html->load_file("http://www.nostalgie.fr/", false, $context);
		$i = 0;
		foreach($html->find('*[class="controlPanel-artist"], *[class="controlPanel-track"]') as $station) 
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'beur fm':
		$html->load_file("https://www.beurfm.net/", false, $context);
		$i = 0;
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station) 
		{   

			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'contact fm':
		$i = 0;
		$html->load_file("https://www.mycontact.fr/", false, $context);
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'france inter':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-france-inter", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'france musique':
		$i = 0;
		$html->load_file("https://www.francemusique.fr/", false, $context);

		foreach($html->find('*[class="cover-direct-content-emission"], *[class="cover-direct-content-authors"]') as $station) 
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;


		case 'generations':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-generations-882-fm", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case "le mouv'":
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-le-mouv", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'sud radio':
		$i = 0;
		$html->load_file("https://www.sudradio.fr/", false, $context);
		foreach($html->find('*[class="show-name"], *[class="show-presenter"]') as $station) 
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'bfm business':
		$html->load_file("https://bfmbusiness.bfmtv.com/mediaplayer/live-video/", false, $context);
		foreach($html->find('*[class="title-medium no-margin padding-top-s"], *[class="color-txt-0 title-normal"]') as $station)
		{   
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'fréquence plus':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-frequence-plus", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;


		case 'hit west':
		$i = 0;
		$html->load_file("http://www.hitwest.com/", false, $context);
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'voltage':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-voltage", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'wit fm':
		$i = 0;
		$html->load_file("http://www.witfm.fr/", false, $context);
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"],*[class="track-title ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
    // …
			$i++;
		}
		break;

		case 'chante france':
		$i = 0;
		$html->load_file("https://www.chantefrance.com/", false, $context);
		foreach($html->find('*[class="artist"], *[class="title"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'france info':
		$i = 0;
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-france-info", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'rfm':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-rfm", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'alouette':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-alouette", false, $context);
		foreach($html->find('*[class="trackInfos"] > *[class="trackName"], *[class="metadata"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'skyrock':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-skyrock", false, $context);
		foreach($html->find('*[class="trackInfos"] > *[class="trackName"], *[class="metadata"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'virgin radio':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-virgin-radio/playlist-radio", false, $context);
		foreach($html->find('*[class="playInfos col-md-10 padding-right-0"] > h3, *[class="playDescription"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'oui fm':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-oui-fm", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'chérie fm':
		$i = 0;
		$html->load_file("https://www.cheriefm.fr/webradios/banner", false, $context);
		foreach($html->find('*[class="controlPanel-track"], *[class="controlPanel-artist"]') as $station)
		{
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'france culture':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-france-culture", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'radio classique':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-radio-classique", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'radio nova':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-radio-nova", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'rfi':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-rfi-monde", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'tsf jazz':
		$i = 0;
		$html->load_file("http://fr-fr.radioline.co/ecouter-tsf-jazz", false, $context);
		foreach($html->find('*[class="col-md-10 padding-right-0"] > *[class="showInfos"] > *[class="showName"], *[class="col-md-10 padding-right-0"] > *[class="peoplesTxt"] > *[class="peoplesNames"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'champagne fm':
		$i = 0;
		$html->load_file("https://www.champagnefm.com/", false, $context);
		foreach($html->find('*[class="track-title ellipsis ellipsis-1l"], *[class="track-artist ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'radiomeuh':
		$i = 0;
		$json_source = file_get_contents('http://player.radiomeuh.com/rtdata/tracks.json');
		$json_data = json_decode($json_source, true);
		foreach($json_data as $v)
		{
			if ($i == 0) 
			{
				echo html_entity_decode($v['titre'] . '|' . $v['artist'], ENT_QUOTES) . '|';
			} 
			$i++;
		}
		break;

		case "puls' radio":
		$html->load_file("https://www.pulsradio.com/player-pulsradio.html", false, $context);
		foreach($html->find('*[id="artind"] > a, *[id="titrind"] > a') as $station)
		{
			echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
		}
		break;

		case 'vibration':
		$i = 0;
		$html->load_file("http://www.vibration.fr/", false, $context);
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'france maghreb 2':
		$i = 0;
		$html->load_file("http://www.francemaghreb2.fr/", false, $context);
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'radio dreyeckland':
		$i = 0;
		$html->load_file("https://www.radiodreyeckland.com/", false, $context);
		foreach($html->find('*[class="track-artist ellipsis ellipsis-1l"], *[class="track-title ellipsis ellipsis-1l"]') as $station)
		{   
			if ($i == 0) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			} 
			else if ($i == 1) 
			{
				echo html_entity_decode($station->plaintext, ENT_QUOTES) . "|";
			}
			$i++;
		}
		break;

		case 'metropolys':
		$html->load_file("http://metropolys.radioking.fr/title/titrage.txt", false, $context);
		$pieces = explode(" - ", $html);
		echo $pieces[0] . "|" . $pieces[1];
		break;

		case 'la radio sympa':
		$html->load_file("http://radio2.pro-fhi.net:9095/currentsong?sid=2", false, $context);
		$pieces = explode(" - ", $html);
		echo $pieces[0] . "|" . $pieces[1];
		break;

		case 'top music':
		$html->load_file("https://www.topmusic.fr/player/widget_title.php", false, $context);
		$pieces = explode(" - ", $html);
		echo $pieces[0] . "|" . $pieces[1];
		break;

		default:
		echo 'NOT_FOUND|NOT_FOUND|';
		break;	
	}

	$html->clear();

} 
catch (Exception $e) 
{
	
}



/*
if ($track == null or $artist == null) 
{
	echo 'NOTHING|NOTHING';
}
else
{
	echo $track . "|" . $artist;
}*/
