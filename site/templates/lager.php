<?php snippet('header') ?>

<div class="row"><div class="small-12 columns">
<?php if (isset($success) and $success === true): ?>
    <div data-alert class="alert-box success">
        <p>Deine Anmeldung war erfolgreich!</p>
        Du hast eine Mail bekommen, wir freuen uns auf Dich!
        <a href="#" class="close">&times;</a>
    </div>
<?php endif; ?>

<?php if (isset($wl) and $wl === true): ?>
    <div data-alert class="alert-box warning">
        <p>Du stehst auf der Warteliste!</p>
        Deine Anmeldung war erfolgreich - leider haben wir aber nur noch Plätze auf der Warteliste frei. 
        <a href="#" class="close">&times;</a>
    </div>
<?php endif; ?>

<?php if (isset($error) and $error === true): ?>
    <div data-alert class="alert-box alert">
        <p>Deine Anmeldung konnte nicht abgeschlossen werden! :(</p>
        Leider ist ein Fehler aufgetreten. Bitte versuche es in ein paar Minuten erneut!
        <a href="#" class="close">&times;</a>
    </div>
<?php endif; ?>
</div></div>

<div class="row">
    <div class="small-9 columns">
        <h2><?= $page->title() ?></h2>
        <?= $page->beschreibung()->kirbytext() ?>
    </div>
    <div class="small-3 columns">
        <?php foreach ($page->images() as $image): ?>
            <img class="th" src="<?= thumb($image, array('width' => 300))->url() ?>"/>
        <?php endforeach ?>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <hr>
    </div>
</div>
<?php if (true): ?>
    <div class="row">
        <div class="small-12 columns">
            <?php if (strtotime((string)$page->anmeldung_start()) < time()): ?>
                <form method="post" data-abide id="myForm">
                    <div class="row">
                        <div class="small-12 large-9 columns">
                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="vorname" class="right inline">Vorname</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="vorname" name="vorname" placeholder="Vorname" required
                                           pattern="names"/>
                                    <small class="error">Bitte gib deinen Vornamen ein!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="name" class="right inline">Name</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="name" name="name" placeholder="Name" required
                                           pattern="names"/>
                                    <small class="error">Bitte gib deinen Nachnamen ein!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="geschlecht" class="right inline">Geschlecht</label>
                                </div>
                                <div class="small-9 columns">
                                    <select name="geschlecht" id="geschlecht">
                                        <option value="m">männlich</option>
                                        <option value="w">weiblich</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="strasse" class="right inline">Adresse</label>
                                </div>
                                <div class="small-7 columns">
                                    <input type="text" id="strasse" name="strasse" placeholder="Straße" required
                                           pattern="names"/>
                                    <small class="error">Bitte gib deine Straße ein!</small>
                                </div>
                                <div class="small-2 columns">
                                    <input type="text" id="hausnummer" name="hausnummer" placeholder="Hausnummer"
                                           required/>
                                    <small class="error">Bitte gib deine Hausnummer ein!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="plz" class="right inline">Wohnort</label>
                                </div>
                                <div class="small-2 columns">
                                    <input type="text" id="plz" name="plz" placeholder="PLZ" required pattern="\d{5}"/>
                                    <small class="error">Bite gib eine PLZ mit fünf Ziffern ein!</small>
                                </div>
                                <div class="small-7 columns">
                                    <input type="text" id="ort" name="ort" placeholder="Wohnort" required
                                           pattern="names"/>
                                    <small class="error">Bitte gib deinen Wohnort ein!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="tel" class="right inline">Telefon</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="tel" name="tel" placeholder="Telefon" required/>
                                    <small class="error">Bitte gib deine Telefonnummer ein!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="handy" class="right inline">Handy der Eltern</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="handy" name="handy" placeholder="Für Notfälle" required/>
                                    <small class="error">Bitte gib eine Notfallnummer ein!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="geb" class="right inline">Geburtsdatum</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="geb" name="geb" placeholder="TT.MM.JJJJ" required
                                           pattern="\d{2}\.\d{2}\.\d{4}"/>
                                    <small class="error">Bitte gib dein Geburtsdatum im Format TT.MM.JJJJ ein!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="email" class="right inline">Email-Adresse</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="email" name="email" class="email"
                                           placeholder="addr@host.de" required pattern="email"/>
                                    <small class="error">Bitte gib ein gültige Email-Adresse ein!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="email2" class="right inline">Email-Adresse (wdh.)</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="email2" name="email2" placeholder="addr@host.de" required
                                           pattern="email" data-equalTo="email"/>
                                    <small class="error">Bitte gib ein gültige Email-Adresse ein, die mit der oberen übereinstimmt!</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="veggie" class="right inline">Vegetarier</label>
                                </div>
                                <div class="small-9 columns">
                                    <select name="veggie" id="veggie">
                                        <option value="nein">Nein</option>
                                        <option value="ja">Ja</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="gruppe" class="right inline">Jugendgruppe</label>
                                </div>
                                <div class="small-9 columns">
                                    <select name="gruppe" id="gruppe">
                                        <option></option>
                                        <?php foreach (page('jugendgruppen')->children()->visible()->sortBy('name', 'ASC') as $gruppe): ?>
                                            <option><?= $gruppe->name() ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="sonstiges" class="right inline">Sonstiges</label>
                                </div>
                                <div class="small-9 columns">
                                    <textarea name="sonstiges" id="sonstiges"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-9 small-push-3 columns">
                                    <input type="submit" class="button" name="submit2a" value="Anmelden"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            <?php else: ?>
                Die Anmeldung ist im Moment nicht freigeschaltet.
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php snippet('footer') ?>
