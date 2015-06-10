<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <h2><?= $page->title() ?></h2>
    </div>
</div>

<div class="row"><div class="small-12 columns">
<?php if (isset($success) and $success === true): ?>
    <div data-alert class="alert-box success">
        <p>Deine Anmeldung war erfolgreich!</p>
        Herzlichen Glückwunsch, du stehst jetzt auf der Warteliste. Sobald wir einen Platz für dich haben, melden wir uns bei dir.
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
    <div class="small-12 columns">
        <?= $page->text()->kirbytext(); ?>
    </div>
</div>

<div class="row">
    <div class="small-12 columns">
        <?php if ($user = $site->user() and ($user->hasRole('admin') or $user->hasRole('jugendleiter'))): ?>
            <div data-alert class="alert-box warning">
                <p>Suchst du die Einträge in der Warteliste?</p>
                Die findest du im <a href="/panel">Panel</a> unter Warteliste.
                <a href="#" class="close">&times;</a>
            </div>
        <?php endif; ?>
        <?php if (!isset($success) && $success !== true): ?>
            <div class="row">
                <div class="small-12 columns">
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
                                        <label for="strasse" class="right inline">Adresse (freiwillig)</label>
                                    </div>
                                    <div class="small-7 columns">
                                        <input type="text" id="strasse" name="strasse" placeholder="Straße" pattern="names"/>
                                        <small class="error">Bitte gib deine Straße ein!</small>
                                    </div>
                                    <div class="small-2 columns">
                                        <input type="text" id="hausnummer" name="hausnummer" placeholder="Hausnummer" />
                                        <small class="error">Bitte gib deine Hausnummer ein!</small>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="small-3 columns">
                                        <label for="plz" class="right inline">Wohnort</label>
                                    </div>
                                    <div class="small-2 columns">
                                        <input type="text" id="plz" name="plz" placeholder="PLZ" pattern="\d{5}"/>
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
                                        <label for="tel" class="right inline">Telefon (freiwillig)</label>
                                    </div>
                                    <div class="small-9 columns">
                                        <input type="text" id="tel" name="tel" placeholder="Telefon" />
                                        <small class="error">Bitte gib deine Telefonnummer ein!</small>
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
                                        <label for="erfahrung" class="right inline">Klettererfahrung</label>
                                    </div>
                                    <div class="small-9 columns">
                                        <textarea name="erfahrung" id="erfahrung"></textarea>
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
                                        <input type="submit" class="button" name="submit2a" value="Eintragen"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php snippet('footer') ?>
