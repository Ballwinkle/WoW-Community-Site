<?php
$class = WoW_Game::GetClass();
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/" rel="np">World of Warcraft</a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/" rel="np"><?php echo WoW_Locale::GetString('template_menu_game'); ?></a></li>
<li><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/race/" rel="np"><?php echo WoW_Locale::GetString('template_game_class_index'); ?></a></li>
<li class="last"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/game/class/<?php echo WoW_Template::GetPageData('class'); ?>" rel="np"><?php echo WoW_Locale::GetString('character_class_' . $class['id']); ?></a></li>
</ol>
</div>
    <div class="content-bot">
      <div id="content-subheader">
        <a class="class-parent" href="./"><?php echo WoW_Locale::GetString('template_game_classes_title'); ?></a>
        <span class="clear"><!-- --></span>
        <h4><?php echo WoW_Locale::GetString('character_class_' . $class['id']); ?></h4>
      </div>
      <div class="faction-req">
        <?php
        if($class['expansion'] > EXPANSION_CLASSIC) {
            echo '<span class="req ' . ($class['expansion'] == 1 ? 'bc' : $class['expansion'] == 2 ? 'wrath' : 'cataclysm') . '">' . WoW_Locale::GetString('template_zone_expansion_required') . ' ' . WoW_Locale::GetString('template_expansion_' . $class['expansion']) . '</span>';
        }
        ?>
      </div>
      <span class="clear"><!-- --></span>
      <div class="left-col">
        <div class="story-highlight">
          <p><?php echo $class['story']; ?></p>
        </div>
        <div class="story-main">
          <div class="story-illustration"></div>
          <?php echo $class['info']; ?>
        </div>
        <div class="basic-info-box-list basic-info">
          <div class="basic-info-box-list-title">
            <span><?php echo sprintf(WoW_Locale::GetString('template_game_class_information'), WoW_Locale::GetString('character_class_' . $class['id'])); ?></span>
          </div>
          <div class="list-box">
            <div class="wrapper">
              <p><?php echo $class['desc']; ?></p>
              <ul>
                <li>
                    <span class="basic-info-title"><?php echo WoW_Locale::GetString('template_game_class_type'); ?></span>
                    <?php
                    $roles_masks = array(
                        'ROLE_MASK_TANK', 'ROLE_MASK_HEALER', 'ROLE_MASK_MELEE', 'ROLE_MASK_RANGED', 'ROLE_MASK_CASTER'
                    );
                    foreach($roles_masks as $mask) {
                        if($class['roles_flag'] & constant($mask)) {
                            $role = strtolower(substr($mask, 10));
                            if(!$role) {
                                continue;
                            }
                            echo WoW_Locale::GetString('template_class_role_' . $role);
                            $class['roles_flag'] -= constant($mask);
                            if($class['roles_flag'] > 0) {
                                echo ', ';
                            }
                        }
                    }
                    ?>
                </li>
                <li>
                    <span class="basic-info-title"><?php echo WoW_Locale::GetString('template_game_class_bars'); ?></span>
                    <?php echo WoW_Locale::GetString('stat_health'); ?>
                </li>
                <li>
                    <span class="basic-info-title"><?php echo WoW_Locale::GetString('template_game_class_armor'); ?></span>
                    <?php
                    $armor_masks = array(
                        'ITEM_SUBCLASS_MASK_CLOTH', 'ITEM_SUBCLASS_MASK_LEATHER', 'ITEM_SUBCLASS_MASK_MAIL', 'ITEM_SUBCLASS_MASK_PLATE', 'ITEM_SUBCLASS_MASK_SHIELD' 
                    );
                    foreach($armor_masks as $mask) {
                        if($class['armors_flag'] & constant($mask)) {
                            $armor = strtolower(substr($mask, 19));
                            echo WoW_Locale::GetString('armor_' . $armor);
                            $class['armors_flag'] -= constant($mask);
                            if($class['armors_flag'] > 0) {
                                echo ', ';
                            }
                        }
                    }
                    ?>
                </li>
                <li>
                    <span class="basic-info-title"><?php echo WoW_Locale::GetString('template_game_class_weapons'); ?></span>
                    <?php //echo WoW_Locale::GetString('template_game_class_'.WoW_Template::GetPageData('class').'_weapons'); ?>
                </li>
              </ul>
              <span class="clear"><!-- --></span>
            </div>
          </div>
        </div>
        <div class="basic-info-box-list talent-info">
          <div class="basic-info-box-list-title">
            <span><?php echo sprintf(WoW_Locale::GetString('template_game_class_talents'), WoW_Locale::GetString('template_game_classes_'.WoW_Template::GetPageData('class'))); ?></span>
          </div>
          <div class="list-box">
            <div class="wrapper">
              <p><?php echo $class['talentsInfo']; ?></p>
              <div class="talent-info-wrapper">
                <div class="talent-header"><?php echo sprintf(WoW_Locale::GetString('template_game_class_talent_trees'), WoW_Locale::GetString('template_game_classes_'.WoW_Template::GetPageData('class'))); ?></div>
                <a href="javascript:;" data-fansite="talentcalc|<?php echo WoW_Template::GetPageData('class'); ?>|000000000000000" class="fansite-link "></a>
                <span class="clear"><!-- --></span>
                <?php
                foreach($class['talents'] as &$talents) {
                    echo '<div class="talent-wrapper">
                        <div class="talent-block" style="background-image:url(http://eu.media.blizzard.com/wow/icons/56/' . $talents['icon'] . '.jpg)">
                            <span class="circle-frame"></span>
                        </div>
                        ' . $talents['name'] . '
                    </div>';
                }
                ?>
                <span class="clear"><!-- --></span>
              </div>
              <span class="clear"><!-- --></span>
            </div>
          </div>
        </div>
      </div>
      <div class="right-col">
        <div class="game-scrollbox">
          <div class="scroll-title">
            <span>Warrior Features</span>
          </div>
          <div class="scroll-content">
            <div class="wrapper">
              <div class="feature-list">
<?php
/* This should be moved to `wow_class_abilities` table. Will done this at home. */
      $features = array(
          'warrior' => array(1 => 'ability_defend.jpg','ability_meleedamage.jpg','spell_nature_ancestralguardian.jpg','ability_warrior_offensivestance.jpg',),
          'paladin' => array(1 => 'spell_holy_avengersshield.jpg','spell_holy_crusaderstrike.jpg','spell_holy_devotionaura.jpg','spell_holy_layonhands.jpg',),
          'hunter' => array(1 => 'ability_hunter_beasttaming.jpg','inv_weapon_bow_02.jpg','spell_frost_chainsofice.jpg','ability_upgrademoonglaive.jpg',),
          'rogue' => array(1 => 'ability_stealth.jpg','inv_weapon_shortblade_15.jpg','spell_shadow_shadowward.jpg','ability_rogue_eviscerate.jpg',),
          'priest' => array(1 => 'spell_holy_greaterheal.jpg','spell_shadow_shadowform.jpg','spell_holy_powerwordshield.jpg','spell_shadow_shadowworddominate.jpg',),
          'death-knight' => array(1 => 'spell_nature_shamanrage.jpg','spell_deathknight_empowerruneblade.jpg','spell_shadow_raisedead.jpg','spell_deathknight_frozenruneweapon.jpg',),
          'shaman' => array(1 => 'spell_nature_healingwavegreater.jpg','spell_shaman_unleashweapon_wind.jpg','spell_nature_lightning.jpg','spell_shaman_dropall_02.jpg'),
          'mage' => array(1 => 'spell_fire_flamebolt.jpg','spell_frost_icestorm.jpg','spell_nature_polymorph.jpg','spell_arcane_portaldalaran.jpg',),
          'warlock' => array(1 => 'spell_shadow_summonfelhunter.jpg','spell_shadow_lifedrain02.jpg','spell_shadow_shadowbolt.jpg','inv_misc_gem_amethyst_02.jpg',),
          'druid' => array(1 => 'ability_druid_mastershapeshifter.jpg','spell_nature_resistnature.jpg','ability_druid_demoralizingroar.jpg','inv_misc_monsterclaw_03.jpg',)
      );
      
      for($i=1;$i<((WoW_Template::GetPageData('class') == 'blood-elf')?4:5);++$i) {
              echo '<div class="feature-item clear-after">
								<span class="icon-frame-gloss float-left" style="background-image: url('.WoW::GetWoWPath().'/wow/icons/56/'.$features[WoW_Template::GetPageData('class')][$i].')">
									<span class="frame"></span>
								</span>
								<div class="feature-wrapper">
									<span class="feature-item-title">'.WoW_Locale::GetString('template_game_class_'.WoW_Template::GetPageData('class').'_feature_title'.$i).'</span>
									<p class="feature-item-desc">'.WoW_Locale::GetString('template_game_class_'.WoW_Template::GetPageData('class').'_feature_desc'.$i).'</p>
								</div>
	               <span class="clear"><!-- --></span>
							</div>';
      }

?>
              </div>
            </div>
          </div>
        </div>
        <div class="available-info-box ">
          <div class="available-info-box-title"><?php echo sprintf(WoW_Locale::GetString('template_game_class_races'), WoW_Locale::GetString('template_game_classes_'.WoW_Template::GetPageData('class'))); ?></div>
          <span class="available-info-box-desc">
          </span>
          <div class="list-box">
            <div class="wrapper">
              <ul>
                <?php
                $race_masks = array(
                    'RACE_MASK_DRAENEI', 'RACE_MASK_DWARF', 'RACE_MASK_GNOME', 'RACE_MASK_HUMAN', 'RACE_MASK_NIGHTELF', 'RACE_MASK_WORGEN',
                    'RACE_MASK_BLOODELF', 'RACE_MASK_GOBLIN', 'RACE_MASK_ORC', 'RACE_MASK_TAUREN', 'RACE_MASK_TROLL', 'RACE_MASK_UNDEAD'
                );
                foreach($race_masks as $mask) {
                    if($class['races_flag'] & constant($mask)) {
                        $race_key = strtolower(substr($mask, 10));
                        $race_id = WoW_Utils::GetRaceIDByKey($race_key);
                        if($race_id == 0) {
                            continue;
                        }
                        echo '<li>
								<a href="../race/' . $race_key . '">
									<span class="icon-frame frame-36" style="background-image: url(http://eu.media.blizzard.com/wow/icons/36/race_' . $race_key . '_female.jpg);">
										<span class="frame"></span>
									</span>
									<span class="list-title">' . WoW_Locale::GetString('character_race_' . $race_id) . '
                                    <span class="list-faction ' . (WoW_Utils::GetFactionId($race_id) == FACTION_ALLIANCE ? 'alliance' : 'horde') . '">' . WoW_Locale::GetString('faction_' . (WoW_Utils::GetFactionId($race_id) == FACTION_ALLIANCE ? 'alliance' : 'horde')) . '</span></span>
								</a>
							</li>';
                    }
                }
                ?>
              </ul>
              <span class="clear"><!-- --></span>
              <span class="clear"><!-- --></span>
            </div>
          </div>
        </div>
        <table class="media-frame">
          <tr>
            <td class="tl"></td>
            <td class="tm"></td>
            <td class="tr"></td>
          </tr>
          <tr>
            <td class="ml"></td>
            <td class="mm">
              <a href="<?php echo WoW::GetWoWPath(); ?>/wow/media/artwork/wow-classes?view=&amp;keywords=<?php echo WoW_Template::GetPageData('class'); ?>">
                <img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/class/thumbnails/<?php echo WoW_Template::GetPageData('class'); ?>-artwork.jpg" alt="<?php echo WoW_Locale::GetString('template_game_class_artwork'); ?>" title="<?php echo WoW_Locale::GetString('template_game_class_artwork'); ?>" width="327" height="134" /></a>
              <div class="caption"><a href="<?php echo WoW::GetWoWPath(); ?>/wow/media/artwork/wow-classes?view=&amp;keywords=<?php echo WoW_Template::GetPageData('class'); ?>" class="view-all"><?php echo WoW_Locale::GetString('template_game_class_viewall'); ?></a><?php echo WoW_Locale::GetString('template_game_class_artwork'); ?>
                <span class="clear"><!-- --></span>
              </div></td>
            <td class="mr"></td>
          </tr>
          <tr>
            <td class="bl"></td>
            <td class="bm"></td>
            <td class="br"></td>
          </tr>
        </table> 
        <table class="media-frame">
          <tr>
            <td class="tl"></td>
            <td class="tm"></td>
            <td class="tr"></td>
          </tr>
          <tr>
            <td class="ml"></td>
            <td class="mm">
              <a href="<?php echo WoW::GetWoWPath(); ?>/wow/media/screenshots/classes?keywords=<?php echo WoW_Template::GetPageData('class'); ?>">
                <img src="<?php echo WoW::GetWoWPath(); ?>/wow/static/images/game/class/thumbnails/<?php echo WoW_Template::GetPageData('class'); ?>-screenshot.jpg" alt="<?php echo WoW_Locale::GetString('template_game_class_screenshots'); ?>" title="<?php echo WoW_Locale::GetString('template_game_class_screenshots'); ?>" width="327" height="134" /></a>
              <div class="caption"><a href="javascript:;" class="view-all"><?php echo WoW_Locale::GetString('template_game_class_viewall'); ?></a><?php echo WoW_Locale::GetString('template_game_class_screenshots'); ?>
                <span class="clear"><!-- --></span>
              </div></td>
            <td class="mr"></td>
          </tr>
          <tr>
            <td class="bl"></td>
            <td class="bm"></td>
            <td class="br"></td>
          </tr>
        </table>
        <span class="clear">
          <!-- -->
        </span> 
        <div class="fansite-link-box">
          <div class="wrapper">
            <span class="fansite-box-title"><?php echo WoW_Locale::GetString('template_game_class_more'); ?></span>
            <p><?php echo WoW_Locale::GetString('template_game_class_more_desc'); ?></p>
            <div id="sdgksdngklsdngl35">
            </div>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
Fansite.generate($('#sdgksdngklsdngl35'), "class|<?php echo $class['id']; ?>|<?php echo WoW_Locale::GetString('character_class_' . $class['id']); ?>");
});
//]]>
</script>
          </div>
        </div>
      </div>
      <span class="clear">
        <!-- -->
      </span>
      <div class="guide-page-nav">
        <span class="current-guide-title"><?php echo WoW_Locale::GetString('character_class_' . $class['id']); ?></span>

      </div>
<?php
if($class['id'] == CLASS_WARRIOR) {
    $nextClassId = CLASS_PALADIN;
    $prevClassId = CLASS_DRUID;
}
elseif($class['id'] == CLASS_WARLOCK) {
    $nextClassId = CLASS_DRUID;
}
elseif($class['id'] == CLASS_DRUID) {
    $nextClassId = CLASS_WARRIOR;
    $prevClassId = CLASS_WARLOCK;
}
if(!isset($nextClassId)) {
    $nextClassId = $class['id'] + 1;
}
if(!isset($prevClassId)) {
    $prevClassId = $class['id'] - 1;
}
?>
<a class="ui-button next-class button1-next" href="<?php echo WoW_Utils::GetClassKeyById($nextClassId); ?>"><span><span><?php echo sprintf(WoW_Locale::GetString('template_game_class_next'), WoW_Locale::GetString('character_class_' . $nextClassId)); ?></span></span></a>
<a class="ui-button previous-class button1-previous" href="<?php echo WoW_Utils::GetClassKeyById($prevClassId); ?>"><span><span><?php echo sprintf(WoW_Locale::GetString('template_game_class_prev'), WoW_Locale::GetString('character_class_' . $prevClassId)); ?></span></span></a>
			</div>
	</div>
</div>