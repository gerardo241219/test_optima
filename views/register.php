<?php
if (isset($url[1]) && $url[1] != "") {

    $query = $db->query("SELECT names, age, phone_number, email, id_model, getModel(id_model) as model FROM tb_register WHERE id_register = '" . $url[1] . "'");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($results as $result) {
        $name = $result->names;
        $age = $result->age;
        $phone_number = $result->phone_number;
        $email = $result->email;
        $id_model = $result->id_model;
        $model = $result->model;
    }
}
?>

<div class="container">
    <form>
        <?php echo isset($url[1]) && $url[1] != "" ? "<input type='hidden' id='input_id' value='" . $url[1] . "'>" : "" ?>
        <div class="inputs">
            <label for="name">Nombre y apellido</label>
            <input type="text" id="name" value="<?php echo isset($name) && $name != "" ? $name : "" ?>" autocomplete="off">
        </div>
        <div class="inputs">
            <label for="age">Edad</label>
            <input type="text" id="age" value="<?php echo isset($age) && $age != "" ? $age : "" ?>" autocomplete="off">
        </div>
        <div class="inputs">
            <label for="number">Numero telefonico</label>
            <input type="text" id="number" value="<?php echo isset($phone_number) && $phone_number != "" ? $phone_number : "" ?>" autocomplete="off">
        </div>
        <div class="inputs">
            <label for="email">Correo electronico</label>
            <input type="email" id="email" value="<?php echo isset($email) && $email != "" ? $email : "" ?>" autocomplete="off">
        </div>
        <div class="inputs">
            <label for="car">Marca</label>
            <select name="" id="car">
                | <?php
                    if (isset($id_model) && $id_model != "") {
                        $query = $db->query("SELECT id_car, name_car FROM tb_car WHERE id_car = (SELECT id_car FROM tb_model WHERE id_model = '" . $id_model . "')");
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $marca_car = "";
                        foreach ($results as $result) {
                            $marca_car = $result->id_car;
                            echo "<option value=" . $result->id_car . ">" . $result->name_car . "</option>";
                        }

                        $query = $db->query("SELECT id_car, name_car FROM tb_car WHERE id_car != (SELECT id_car FROM tb_model WHERE id_model = '" . $id_model . "')");
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        foreach ($results as $result) {
                            echo "<option value=" . $result->id_car . ">" . $result->name_car . "</option>";
                        }
                    } else {
                        echo "<option value=''>-- Secciona una marca --</option>";
                        $query = $db->query("SELECT * FROM tb_car");
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        foreach ($results as $result) {
                            echo "<option value=" . $result->id_car . ">" . $result->name_car . "</option>";
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="inputs">
            <label for="model">Modelo</label>
            <select name="" id="model">
                <?php
                if (isset($id_model) && $id_model != "") {
                    echo "<option value=" . $id_model . ">" . $model . "</option>";

                    $query = $db->query("SELECT id_model, name_model FROM tb_model WHERE tb_model.id_car = '" . $marca_car . "' AND id_model != '" . $id_model . "' ");
                    $query->execute();

                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    foreach ($results as $result) {
                        echo "<option value=" . $result->id_model . ">" . $result->name_model . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="inputs">
            <button data-register="<?php echo $url[1]; ?>" id="<?php echo isset($url[1]) && $url[1] != "" ? "edit" : "register" ?>"><?php echo isset($url[1]) && $url[1] != "" ? "Editar" : "Registrar" ?></button>
        </div>
    </form>
</div>