<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FORMULAIRE</title>
    <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="fixed-bg">
        <div class="container text-center padding-top">
            <h1 style="font-size: 70px;">Formulaire</h1>
            <p style="font-size: 40px;">Ci dessous, Voici un formulaire</p>
            </p>
        </div>
    </div>
</header>
<div style="margin-left: 20%;margin-right: 20%;">
    <?php
        require __DIR__.'/forms.php';
        // affiche le resultat du form
        if(!empty($_POST)){

            $result = null;
            // on affiche le tableau
            foreach($_POST as $key => $value){
                $result .= '<div class="alert alert-info" role="alert">';
                $result .=  '<p><strong>';
                $result .= $key;
                $result .= ' : </strong></p>';
                if(is_array($value))
                {
                    $result .= '<ul>';
                    foreach($value as $elements){
                        $result .= '<li>'.$elements.'</li>';
                    }
                    $result .= '</ul>';
                }
                else
                    $result .= '<p>'.$value.'</p>';

                $result .= '</div>';
            }
            echo $result;
        }
        // instanciation d'un Formulaire
        $form  = new Forms('Adrien LOUGE');

        // valeur Champs
        $arrayInputs = ['Nom', 'Prénom', 'Age', 'ville', 'Nationalité', 'Pays', 'Job', 'CP', 'Niveau d\'étude', 'others'];
        $size = ['1', '2', '3'];
        $freetime =  ['sport', 'lecture' , 'other ...'];
        $sexe  = ['M', 'F'];
        $arrayTextareas = ['description', 'Je ne sais pas'];
        $arrayCheckbox = ['1', '2', '3', '4', '5'];
        $arrayRadio = ['Truc1', 'Truc2', 'Truc3', 'Truc4', 'Truc5'];


        // initiation du Form
        echo $form->initForm();
        // Input
        foreach($arrayInputs as $arrayInput){
            echo $form->input($arrayInput);
        }

        // select
        echo $form->select('loisirs', $freetime);
        echo $form->select('taille', $size);
        echo $form->select('Sexe', $sexe);

        // checkbox
        echo $form->checkbox('Les Trucs', $arrayCheckbox);
        echo $form->bpRadio('Un Truc', $arrayRadio);


        // Textarea
        foreach($arrayTextareas as $arrayTextarea){
            echo $form->textarea($arrayTextarea);
        }


        // button
        echo $form->buttons('resset');
        echo $form->buttons('submit');

        // fin du formulaire
        $form->endForm();
    ?>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>