<div id="section">
			<div id="game-showcase">

				<div id="game-selections">
						<div class="selection-block">
							<h3 class="selection-title"><?php echo WoW_Locale::GetString('template_bn_my_games'); ?> <span>(1)</span></h3>




		<div class="game-selection " id="game-WOW<?php echo WoW_Account::GetExpansion() > 0 ? 'X' . WoW_Account::GetExpansion() : 'C'; ?>" onclick="openGameDialog(this, '#dialog-WOW<?php echo WoW_Account::GetExpansion() > 0 ? 'X' . WoW_Account::GetExpansion() : 'C'; ?>');" title="<?php echo WoW_Locale::GetString('expansion_' . WoW_Account::GetExpansion()); ?>">
			<img class="box" src="/static/local-common/images/game-boxes/<?php echo WoW_Locale::GetLocale(LOCALE_DOUBLE); ?>/wow<?php echo WoW_Account::GetExpansion() > 0 ? 'x' . WoW_Account::GetExpansion() : 'C'; ?>.png" alt="" />
			<span class="plus"></span>
			<div class="game-label"><?php echo WoW_Locale::GetString('expansion_' . WoW_Account::GetExpansion()); ?></div>


			<span class="pointer"></span>
		</div>
						</div>

						<div class="selection-block">
							<h3 class="selection-title"><?php echo WoW_Locale::GetString('template_bn_buy_game'); ?> <span>(6)</span></h3>




		<div class="game-selection unowned" id="game-S2" onclick="openGameDialog(this, '#dialog-S2');" title="StarCraft II">
			<img class="box" src="/static/local-common/images/game-boxes/ru-ru/s2.png" alt="" />
			<span class="plus"></span>
			<div class="game-label">StarCraft II</div>


				<img class="plus" src="/static/images/homepage/plus.png" title="Прикрепить игру" alt="" />

			<span class="pointer"></span>
		</div>



		<div class="game-selection unowned" id="game-WAR3" onclick="openGameDialog(this, '#dialog-WAR3');" title="WarCraft III: Reign of Chaos">
			<img class="box" src="/static/local-common/images/game-boxes/ru-ru/war3.png" alt="" />
			<span class="plus"></span>
			<div class="game-label">WarCraft III: Reign of Chaos</div>


				<img class="plus" src="/static/images/homepage/plus.png" title="Прикрепить игру" alt="" />

			<span class="pointer"></span>
		</div>



		<div class="game-selection unowned" id="game-W3XP" onclick="openGameDialog(this, '#dialog-W3XP');" title="WarCraft III: The Frozen Throne">
			<img class="box" src="/static/local-common/images/game-boxes/ru-ru/w3xp.png" alt="" />
			<span class="plus"></span>
			<div class="game-label">WarCraft III: The Frozen Throne</div>


				<img class="plus" src="/static/images/homepage/plus.png" title="Прикрепить игру" alt="" />

			<span class="pointer"></span>
		</div>



		<div class="game-selection unowned" id="game-D2DV" onclick="openGameDialog(this, '#dialog-D2DV');" title="Diablo II">
			<img class="box" src="/static/local-common/images/game-boxes/ru-ru/d2dv.png" alt="" />
			<span class="plus"></span>
			<div class="game-label">Diablo II</div>


				<img class="plus" src="/static/images/homepage/plus.png" title="Прикрепить игру" alt="" />

			<span class="pointer"></span>
		</div>



		<div class="game-selection unowned" id="game-D2XP" onclick="openGameDialog(this, '#dialog-D2XP');" title="Diablo II: Lord of Destruction">
			<img class="box" src="/static/local-common/images/game-boxes/ru-ru/d2xp.png" alt="" />
			<span class="plus"></span>
			<div class="game-label">Diablo II: Lord of Destruction</div>


				<img class="plus" src="/static/images/homepage/plus.png" title="Прикрепить игру" alt="" />

			<span class="pointer"></span>
		</div>



		<div class="game-selection unowned" id="game-STAR" onclick="openGameDialog(this, '#dialog-STAR');" title="StarCraft">
			<img class="box" src="/static/local-common/images/game-boxes/ru-ru/star.png" alt="" />
			<span class="plus"></span>
			<div class="game-label">StarCraft</div>


				<img class="plus" src="/static/images/homepage/plus.png" title="Прикрепить игру" alt="" />

			<span class="pointer"></span>
		</div>
						</div>
	<span class="clear"><!-- --></span>
				</div>

				<div id="game-dialogs">





		<div class="game-selection-dialog" id="dialog-WOW<?php echo WoW_Account::GetExpansion() > 0 ? 'X' . WoW_Account::GetExpansion() : 'C'; ?>" style="display: none">
			<div class="game-label">
				<?php echo WoW_Locale::GetString('expansion_' . WoW_Account::GetExpansion()); ?>
			</div>

				<a href="/account/management/" class="dialog-button manage-game">
					<span><?php echo WoW_Locale::GetString('template_bn_manage_game'); ?></span>
				</a>


				<a href="/wow/" class="dialog-button community">
					<span><?php echo WoW_Locale::GetString('template_bn_community'); ?></span>
				</a>

	<span class="clear"><!-- --></span>
		</div>






		<div class="game-selection-dialog" id="dialog-S2" style="display: none">
			<div class="game-label">
				StarCraft II
			</div>

					<a href="https://eu.battle.net/account/activation/landing.html?product=S2&amp;key&amp;purchase" class="dialog-button buy-physical">
						<span><?php echo WoW_Locale::GetString('template_bn_orders'); ?></span>
					</a>

					<a href="https://eu.battle.net/account/management/digital-purchase.html?product=S2&amp;gameRegion=EU" class="dialog-button buy-digital">
						<span><?php echo WoW_Locale::GetString('template_bn_buy_egame'); ?></span>
					</a>

				<a href="http://eu.battle.net/sc2/" class="dialog-button community">
					<span><?php echo WoW_Locale::GetString('template_bn_community'); ?></span>
				</a>

	<span class="clear"><!-- --></span>
		</div>




		<div class="game-selection-dialog" id="dialog-WAR3" style="display: none">
			<div class="game-label">
				WarCraft III: Reign of Chaos
			</div>

					<a href="http://eu.blizzard.com/store/details.xml?id=210000045" class="dialog-button buy-physical">
						<span><?php echo WoW_Locale::GetString('template_bn_orders'); ?></span>
					</a>

					<a href="https://eu.battle.net/account/management/digital-purchase.html?product=WAR3&amp;gameRegion=EU" class="dialog-button buy-digital">
						<span><?php echo WoW_Locale::GetString('template_bn_buy_egame'); ?></span>
					</a>

				<a href="http://eu.battle.net/games/classic" class="dialog-button community">
					<span><?php echo WoW_Locale::GetString('template_bn_community'); ?></span>
				</a>

	<span class="clear"><!-- --></span>
		</div>




		<div class="game-selection-dialog" id="dialog-W3XP" style="display: none">
			<div class="game-label">
				WarCraft III: The Frozen Throne
			</div>

					<a href="http://eu.blizzard.com/store/details.xml?id=210000003" class="dialog-button buy-physical">
						<span><?php echo WoW_Locale::GetString('template_bn_orders'); ?></span>
					</a>

					<a href="https://eu.battle.net/account/management/digital-purchase.html?product=W3XP&amp;gameRegion=EU" class="dialog-button buy-digital">
						<span><?php echo WoW_Locale::GetString('template_bn_buy_egame'); ?></span>
					</a>

				<a href="http://eu.battle.net/games/classic" class="dialog-button community">
					<span><?php echo WoW_Locale::GetString('template_bn_community'); ?></span>
				</a>

	<span class="clear"><!-- --></span>
		</div>




		<div class="game-selection-dialog" id="dialog-D2DV" style="display: none">
			<div class="game-label">
				Diablo II
			</div>

					<a href="http://eu.blizzard.com/store/details.xml?id=210000089" class="dialog-button buy-physical">
						<span><?php echo WoW_Locale::GetString('template_bn_orders'); ?></span>
					</a>

					<a href="https://eu.battle.net/account/management/digital-purchase.html?product=D2DV&amp;gameRegion=EU" class="dialog-button buy-digital">
						<span><?php echo WoW_Locale::GetString('template_bn_buy_egame'); ?></span>
					</a>

				<a href="http://eu.battle.net/games/classic" class="dialog-button community">
					<span><?php echo WoW_Locale::GetString('template_bn_community'); ?></span>
				</a>

	<span class="clear"><!-- --></span>
		</div>




		<div class="game-selection-dialog" id="dialog-D2XP" style="display: none">
			<div class="game-label">
				Diablo II: Lord of Destruction
			</div>

					<a href="http://eu.blizzard.com/store/details.xml?id=210000090" class="dialog-button buy-physical">
						<span><?php echo WoW_Locale::GetString('template_bn_orders'); ?></span>
					</a>

					<a href="https://eu.battle.net/account/management/digital-purchase.html?product=D2XP&amp;gameRegion=EU" class="dialog-button buy-digital">
						<span><?php echo WoW_Locale::GetString('template_bn_buy_egame'); ?></span>
					</a>

				<a href="http://eu.battle.net/games/classic" class="dialog-button community">
					<span><?php echo WoW_Locale::GetString('template_bn_community'); ?></span>
				</a>

	<span class="clear"><!-- --></span>
		</div>




		<div class="game-selection-dialog" id="dialog-STAR" style="display: none">
			<div class="game-label">
				StarCraft
			</div>

					<a href="http://eu.blizzard.com/store/details.xml?id=210000002" class="dialog-button buy-physical">
						<span><?php echo WoW_Locale::GetString('template_bn_orders'); ?></span>
					</a>

					<a href="https://eu.battle.net/account/management/digital-purchase.html?product=STAR&amp;gameRegion=EU" class="dialog-button buy-digital">
						<span><?php echo WoW_Locale::GetString('template_bn_buy_egame'); ?></span>
					</a>

				<a href="http://eu.battle.net/games/classic" class="dialog-button community">
					<span><?php echo WoW_Locale::GetString('template_bn_community'); ?></span>
				</a>

	<span class="clear"><!-- --></span>
		</div>
				</div>
			</div>

	<span class="clear"><!-- --></span>

			<div id="community-section">
				<h3 class="selection-title"><?php echo WoW_Locale::GetString('template_bn_game_cs'); ?></h3>
			</div>
		</div>
