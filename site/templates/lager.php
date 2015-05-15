<?php snippet('header') ?>

<?php if (isset($success) and $success === true): ?>
    <div data-alert class="alert-box success">
        Deine Anmeldung war erfolgreich! Du hast eine Mail bekommen, wir freuen uns auf Dich!
        <a href="#" class="close">&times;</a>
    </div>
<?php endif; ?>

<?php if (isset($errors) and $errors !== false): ?>
    <div data-alert class="alert-box warning">
        Achtung, es sind Fehler aufgetreten!
        <a href="#" class="close">&times;</a>
    </div>
<?php endif; ?>

<div class="row">
    <div class="small-12 columns">
        <h2><?= $page->title() ?></h2>
        <?= $page->beschreibung()->kirbytext() ?>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <hr>
    </div>
</div>
<?php if(true): ?>
    <div class="row">
        <div class="small-12 columns">
            <?php if (strtotime((string)$page->anmeldung_start()) < time()): ?>
                <form method="post">
                    <div class="row">
                        <div class="small-9 columns">
                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="vorname" class="right inline">Vorname</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="vorname" name="vorname" placeholder="Vorname"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="name" class="right inline">Name</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="name" name="name" placeholder="Name"/>
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
                                    <input type="text" id="strasse" name="strasse" placeholder="Straße"/>
                                </div>
                                <div class="small-2 columns">
                                    <input type="text" id="hausnummer" name="hausnummer" placeholder="Hausnummer"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="plz" class="right inline">Wohnort</label>
                                </div>
                                <div class="small-2 columns">
                                    <input type="text" id="plz" name="plz" placeholder="PLZ"/>
                                </div>
                                <div class="small-7 columns">
                                    <input type="text" id="ort" name="ort" placeholder="Wohnort"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="tel" class="right inline">Telefon</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="tel" name="tel" placeholder="Telefon"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="handy" class="right inline">Handy der Eltern</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="handy" name="handy" placeholder="Für Notfälle"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="geb" class="right inline">Geburtsdatum</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="geb" name="geb" placeholder="TT.MM.JJJJ"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="email" class="right inline error">Email-Adresse</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="email" name="email" class="email" placeholder="addr@host.de"/>
                                    <small class="error">Nononono</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="email2" class="right inline">Email-Adresse (wdh.)</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="email2" name="email2" placeholder="addr@host.de"/>
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
