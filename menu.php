<div class="menu">
				<ul>
					<?php
					foreach ($seznamStranek as $stranka) {
						if ($stranka->getMenu() !="") {
						echo "<li><a href='{$stranka->getId()}'>{$stranka->getMenu()}</li>";
					}
					}

					?>
				</ul>
			</div>
