<?php

/*Template Name: Investors Template*/

//get_header();

$investors = array(
    array('14w.com','14w'),
    array('ablepartners.nyc','Able Partners'),
    array('www.aja.life','Aja Ventures'),
    array('www.apeiron-investments.com','Apeiron Investment Group'),
    array('www.archventure.com','Arch Venture Partners'),
    array('www.atai.life','ATAI Life Sciences AG'),
    array('www.berggruenholdings.com','Berggruen Holdings'),
    array('bertiinvestments.com','Berti Investments'),
    array('www.bezosexpeditions.com','Bezos Expeditions'),
    array('www.blackhawkgrowth.com','Blackhawk Growth Corp.'),
    array('','bordeaux-capital (need neuly link)'),
    array('','btg-capital (need neuly link)'),
    array('','chris-kantrowitz (need neuly link)'),
    array('www.camdenpartners.com','Camden Partners'),
    array('www.cataliocapital.com','Catalio Capital Management'),
    array('www.decheng.com','Decheng Capital'),
    array('www.deepend.partners','Deepend Partners'),
    array('','delphi investments (need neuly link)'),
    array('www.egbventures.com','EGB Ventures'),
    array('viiicapital.com','Eight Capital'),
    array('','energia investments (need neuly link)'),
    array('www.explorerequity.com','Explorer Equity'),
    array('www.alphawaveglobal.com','Falcon Edge Capital (Alpha Wave Global)'),
    array('www.fearless.vc','Fearless Ventures'),
    array('www.felixcap.com','Felix Capital'),
    array('www.foresitecapital.com','Foresite Capital'),
    array('foundersfund.com','Founders Fund'),
    array('future.ventures','Future Ventures'),
    array('gaingels.com','Gaingels'),
    array('www.generalcatalyst.com','General Catalyst'),
    array('www.grassfedventures.com','Grassfed Ventures'),
    array('www.gron.vc','Gron Ventures'),
    array('','highline-capital (need neuly link)'),
    array('','integrated (need neuly link)'),
    array('innovating.capital','Innovating Capital'),
    array('isomercapital.com','Isomer Capital'),
    array('www.iterinvestments.com','Iter Investments'),
    array('jamjarinvestments.com','JamJar Investments'),
    array('www.jls.fund','JLS Fund'),
    array('','kevin-j-weiss (need neuly link)'),
    array('www.leafytunnel.com','Leafy Tunnel'),
    array('lsvp.com','Lightspeed Venture Partners'),
    array('limitlessventures.org','Limitless Ventures'),
    array('magnafilis.com','Magna Filis Ventures'),
    array('masawa.fund','Masawa Management'),
    array('','mayfield (need neuly link)'),
    array('mazakali.com','MAZAKALI'),
    array('www.mbxcapital.com','MBX Capital'),
    array('www.mediqventures.com','Mediqventures'),
    array('','michael-novogratz (need neuly link)'),
    array('www.montaltocapital.com','Mount Alto Capital'),
    array('www.goldmangroup.com/contact','Murray Goldman'),
    array('negevcap.com','Negev Capital'),
    array('www.neokuma.co','Neo Kuma Ventures'),
    array('www.nea.com','New Enterprise Associates'),
    array('noeticfund.com','Noetic Fund'),
    array('www.nova-cap.com','Nova Capital Management'),
    array('www.novamind.ca','Novamind'),
    array('o2h.com','o2h Ventures'),
    array('oskarecapital.com','Oskare Capital'),
    array('www.palosanto.vc','Palo Santo'),
    array('','peak-asset-management (need neuly link)'),
    array('pif.vc','PIF'),
    array('www.presight.vc','Presight Capital'),
    array('www.primemoverslab.com','Prime Movers Lab'),
    array('principiasgr.it','Principia SGR'),
    array('psilos.com','Psilos Group'),
    array('psymed.ventures','Psymed Ventures'),
    array('www.puravidainvestments.com','Pura Vida Investments'),
    array('www.qc-ventures.com','QC Ventures'),
    array('remind.vc','reMind Capital'),
    array('www.republiccapital.co','Republic Labs'),
    array('roadmancorp.com','Roadman Investments Corp.'),
    array('','robert-mcquade (need neuly link)'),
    array('route66ventures.com','Route 66 Ventures'),
    array('7hventures.co','Seven Hound Ventures'),
    array('skyviewslifescience.com','Skyviews Life Science'),
    array('www.soleuscapital.com','Soleus Capital'),
    array('www.subversivecapital.com','Subversive Capital'),
    array('www.synaptic.vc','Synaptic Ventures'),
    array('tabularasaventures.webflow.io','Tabula Rasa Ventures'),
    array('www.taocap.com','Tao Capital Partners'),
    array('theconscious.fund','The Conscious Fund'),
    array('www.thielcapital.com','Thiel Capital'),
    array('www.velospartners.com','Velos Partners'),
    array('vvp.vc','Vertical Venture Partners'),
    array('viceventures.com','Vice Ventures'),
    array('vine.vc','Vine Ventures'),
    array('whatif.vc','What If Ventures'),
    array('www.weekend.fund','Weekend Fund'),
    array('woodlinepartners.com','Woodline Partners'),
    array('wpssinvestments.com','WPSS Investments'),
    array('www.ycombinator.com','Y Combinator')
);

$x = 0;
foreach($investors as $investor)
{
    if($x % 4 == 0)
    {
        echo '<!-- wp:columns --><div class="wp-block-columns">';
        for($i = 0; $i <= 3; $i++)
        {
            echo '<!-- wp:column -->';
            echo '<div class="wp-block-column"><!-- wp:paragraph -->';
            echo '<p><a rel="noreferrer noopener" href="https://' . $investors[$x][0] . '" target="_blank">' . $investors[$x][1] .'</a></p>';
            echo '<!-- /wp:paragraph --></div>';
            echo '<!-- /wp:column -->';
            $x++;
        }
       echo '</div><!-- /wp:columns -->';
    
    }

    else
    {
        echo '<!-- wp:column -->';
        echo '<div class="wp-block-column"><!-- wp:paragraph -->';
        echo '<p><a rel="noreferrer noopener" href="https://' . $investor[0] . '" target="_blank">' . $investor[1] .'</a></p>';
        echo '<!-- /wp:paragraph --></div>';
        echo '<!-- /wp:column -->';
    }


}
        

    //get_footer();
?>