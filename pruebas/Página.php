<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta charset="author" name="Jose Antonio Bodes García"/> 
        <title>Agradece en compañia</title>
    </head>
    <body>
        <header>
            <h1>Agradece en compañia</h1>
        </header>

        <main>
            <form>
                <p>Para</p>
                <select id="lista" name="lista">
                    <!--Para hacerlo dinamico, habría que hacer un while recorriendo la tabla alumnos
                     en value poner el campo idAlumno y dentro del nombre donde pone Jesuita poner el campo nombre.
                     Así aparecerían todos los alumnos sin tener que ponerlos todos dentro de options,-->
                    <?php
                      <option value="1">Jesuita</option>
                    ?>
                </select>
                <p>Quiero agradecerte</p>
                <textarea placeholder="Escribe aqui tu mensaje de agradecimiento"></textarea>
                <br>
                <input type="submit">
            </form>
        </main>

        <footer>
            <p>Agradece en compañia</p>

        </footer>

    </body>
</html>
