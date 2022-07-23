<main class="container">
    <div class="container__table">
        <table class="table" id="table">
            <thead>
                <tr>
                    <td>Nombres</td>
                    <td>Edad</td>
                    <td>Numero de telefono</td>
                    <td>Correo</td>
                    <td>Modelo</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $db->query("SELECT id_register, names, age, phone_number, email, getModel(id_model) as model FROM tb_register");
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                foreach ($results as $result) {
                ?>
                    <tr>
                        <td><?php echo $result->names; ?></td>
                        <td><?php echo $result->age; ?></td>
                        <td><?php echo $result->phone_number; ?></td>
                        <td><?php echo $result->email; ?></td>
                        <td><?php echo $result->model; ?></td>
                        <td>
                            <a class="btn_table btn_modify" href="register/<?php echo $result->id_register; ?>"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn_table btn_delete" href="#" data-register="<?php echo $result->id_register; ?>" id="btn_delete"><i class="bi bi-x"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>