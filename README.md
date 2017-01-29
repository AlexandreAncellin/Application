# Notre application

**Comment effectuer une traduction dans un fichier .phtml ?**

- Enregistrer dans le fichier *.mo dans le repertoire language le texte.
- Exemple dans le fichier fr_FR.mo :
```php
return array(
    "layout.application.name"   => "Nom de l'application",
    "menu.authentication"       => "Inscription",
    );
```
**Comment l'utiliser dans un fichier .phtml ?**
```php
<?= $this->translate('menu.authentication') ?>
```

#### Les icônes :

J'ai installé le Css Toolkit FontAwesome il est accessible dans toutes les vues .phtml.
Consulter la liste des icônes disponibles : http://fontawesome.io/icons/

**Exemple d'utilisation :**

```html
<i class="fa fa-user" aria-hidden="true"></i>
```

Pour plus d'informations me contacter :
**alexandre.ancellin@gmail.com**