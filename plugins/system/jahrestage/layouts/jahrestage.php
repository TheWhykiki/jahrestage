<?php
    use Joomla\CMS\Date\Date;
    use Joomla\CMS\Language\Text;

    setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
    extract($displayData);
    $jahrestage = $displayData;
    $datum = $jahrestage['datum'];
    $datumFormatted = strftime("%d.%m.%Y", strtotime($datum));
    $titel = $jahrestage['titel'];
    $beschreibung = $jahrestage['beschreibung'];

?>
<?php if($jahrestage != null): ?>
<div class="jahrestagContainer">
    <div class="jahrestagDatum">
        <span class="jahrestagTag"><?php echo $datumFormatted; ?></span>
    </div>
    <div class="jahrestagTitel">
        <span class="jahrestagTitel"><?php echo $titel; ?></span>
    </div>
    <div class="jahrestagBeschreibung">
        <span class="jahrestagBeschreibung"><?php echo $beschreibung; ?></span>
    </div>
</div>
<?php endif; ?>
