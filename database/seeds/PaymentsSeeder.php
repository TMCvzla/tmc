<?php

use App\Model\PagoHistorico;
use App\Pago;
use Illuminate\Database\Seeder;


class PaymentsSeeder extends Seeder {

    /**
     *
     */
    public function run()
    {
        $products = [
            'Caja de Naranjas','Mandarinas','Cambures','Pepitos','Monitor 17 Pulgadas','Teclado','Mouse Optico',
            'Mueble Decorativo','Moto','Laptod','Almuerzo','Desayuno','Cena','Disco Duro','Celular Inteligente',
            'Impresora Multifuncional','Charcutería','Queso Amarillo','Jamon Ahumado','Galletas','Pollo Entero',
            'Maiz', 'Piña', 'Café', 'Banana', 'Naranja', 'Yuca', 'Coco', 'Caña De Azucar', 'Mango', 'Chirimoya', 'Papaya',
            'Melón', 'Sandía', 'Calabacin', 'Higo', 'Tuna', 'Toronja', 'Lima', 'Limón', 'Canela', 'Vainilla', 'Girasol',
            'Pepino', 'Tomate', 'Pimiento', 'Papa O Patata', 'Zanahoria', 'Nuez', 'Lechuga', 'Repollo O Col', 'Coliflor',
            'Nabos', 'Rábanos', 'Mandarina', 'Jamaica', 'Arroz', 'Frijóles', 'Habas', 'Alubias', 'Lentejas', 'Garbanzos',
            'Almendras', 'Cacahuete', 'Avellanas', 'Fresas', 'Cerezas', 'Ciruelas', 'Duraznos', 'Arroz Blanco', 'Harina',
            'Aceite', 'Carne', 'Pasta', 'Frutas', 'Fertilizante', 'Pollo', 'Azúcar', 'Leche en Polvo', 'Sorgo', 'Café', 'Maíz',
            'Crema Dental', 'Suavizante', 'Enjuague', 'Cera', 'Jabón de Baño', 'Detergente', 'Jabón', 'Toallas Sanitarias',
            'Desodorantes', 'Máquina de Afeitar', 'Cloro', 'Lavaplatos',
        ];

        $nombres = [
            'Martin','María','Andrea','Martha','Andres','Carlos','Miguel','Karla','Mercedes','Milagros',
            'Daniela','Freddy','Jhony','Wikelan','Yefferson','Yuleidy','Lola','Sinibaldo','Marina','Eduardo',
            'Luis', 'Migueangel', 'Jose', 'Maria', 'Luis', 'Carmen', 'Carlos', 'Juan', 'Ana', 'Jesus', 'Pedro', 'Rosa',
            'Rafael', 'Angel', 'Francisco', 'Miguel', 'Jorge', 'Ramon', 'Victor', 'Manuel', 'Antonio', 'Julio', 'Kerbis',
            'Yojanson', 'Yudelkis', 'Yon', 'Yefry', 'Yeferson', 'Yormis', 'Torkill', 'Danitza', 'Yurly', 'Chirly',
            'Deivis', 'Brayan', 'Kely', 'Tiundy', 'Tísuby', 'Tiamy', 'Yeny', 'Sobeida', 'Marsobeida', 'Yubimar',
            'Yurimar', 'Yurima', 'Yurubí', 'Dorkis', 'Gladiuska', 'Yaritza', 'Karitza', 'Ylallalic', 'Yeniber',
            'Diomira', 'Yoniray', 'Maryuli', 'Rodwig', 'Kepler', 'Rostin', 'Lipso', 'Yurmuari', 'Norka', 'Yuruani',
            'Yamarlef', 'Aleuzenev', 'Jubino', 'Davirsia', 'Levy', 'Hercilia', 'Yomira', 'Yudimel', 'Wilkinson',
            'Yanis', 'Yancarlo', 'Owinch', 'Yuraima', 'Mairim', 'Nelmar', 'Kleiber', 'Yubirí', 'Albiera', 'Besaida',
            'Maickel', 'Damelys', 'Osmar', 'Daivi', 'Usnavy', 'Angely', 'Solmaira', 'Miraidis', 'Yesenia', 'Yuraima',
            'Yurimia', 'Yaletzi', 'Yalisbet', 'Yaifré', 'Yoraidí', 'Yeniber', 'Yornaichel', 'Norkis', 'Franmer',
            'Merfrán', 'Danixe', 'Dixon', 'Yoelbis', 'Petrasmit', 'Olmelibey', 'Armaribely', 'Rafbet', 'Rosaherbalaif',
            'Dardha', 'Isbery', 'Anglory', 'Yorbelys', 'Leidy', 'Milka', 'Doreidis', 'Miradis', 'Migdalia', 'Migdalis',
            'Dilsia', 'Diogne', 'Diognis', 'Amorfiel', 'Diosdado', 'Jiovana', 'Eileen', 'Danibel', 'Jennisse',
            'Yibisenia', 'Sensitymoon', 'Yondry', 'Raidys', 'Betsy', 'Betsymar', 'Ginesca', 'Yenise', 'Amarilis',
            'Yolimar', 'Denison', 'Etanislao', 'Esfreis', 'Vianney', 'Lelis', 'Ismaru', 'Yenmil', 'Coraima',
            'Yorman', 'Dilsia', 'Yorbelis', 'Edecio', 'Ewin', 'Yanara', 'Keiyur', 'Danivell', 'Keliana', 'Gretty',
            'Lasmey', 'Freilly', 'Erwin', 'Rosimar', 'Yenisy', 'Havey', 'Vigneys', 'Kismeth', 'Gilmer', 'Osnan',
            'Janlú', 'Aimara', 'Nidesca', 'Yovany', 'Yoconda', 'Claid', 'Dilexa', 'Kechena', 'Wianmal', 'Aroska',
            'Mayra', 'Tibayre', 'Coraima', 'Aiskel', 'Damaris', 'Yumaris', 'Dakmar', 'Fanely', 'Iraima', 'Ariuxi',
            'Maloha', 'Yajaira', 'Dorángel', 'Darwis', 'Amarilis', 'Rosmely', 'Yumber', 'Norka', 'Zenaida', 'Grisel',
            'Lenelina', 'Carmely', 'Enderson', 'Osly', 'Yolimar', 'Yulimar', 'Zulay', 'Isnardo', 'Johanson',
            'Yamelis', 'Indira', 'Nadesca', 'Ismelis', 'Catriel', 'Yalisbeth', 'Dubraska', 'Desireth', 'Magly',
            'Damaris', 'Gianine', 'Dalix', 'Wuilbert', 'Yoshkar', 'Solaine', 'Jean Frank', 'Norelys', 'Aneldo',
            'Rixio', 'Agnelys', 'Dalmiro', 'Yorelys', 'Lobenis', 'Keindel', 'Derbys', 'Maxiel', 'Aliera',
            'Williams', 'Georguel', 'Hilwilm', 'Mereanyela', 'Siuris', 'Esnilda', 'Nélida', 'Elisio', 'Yudlisbeth',
            'Magaly', 'Yngrid', 'Mawel', 'Rexaimiyori', 'Willderman', 'Doreisa', 'Melody', 'Nadelys', 'Veruzka',
            'Jarol', 'Jakson', 'Wester', 'Walfred', 'Yenniter', 'Hayram', 'Stuart', 'Nabetse', 'Susej', 'Yutsitibilisay',
            'Malilis', 'Marlin', 'Yesaidu', 'Osnaiker', 'Yoneiker', 'Rotny', 'Ariani', 'Joffre', 'Juan Jondre',
            'Vielman', 'Anyeli', 'Everlide', 'Dinalba', 'Yóger', 'Yerly', 'Yunior', 'Magalis', 'Mirosmar', 'Lilianes',
            'Enelda', 'Yolimar', 'Caribay', 'Zuleimy', 'Lennar', 'Geronis', 'Nuris', 'Naileth', 'Wilfred', 'Duncan',
            'Erylin', 'Roselyn', 'Mayarleth', 'Wilmer', 'Maikol', 'Yan Karll', 'Dayana', 'Leido', 'Githanjaly',
            'Netsemany', 'Yaemmy', 'Nereydys', 'Neldo', 'Eglida', 'Javiera', 'Marlenys', 'Yisel', 'Mayerling',
            'Maryele', 'Lysber', 'Sheila', 'Georgelis', 'Arielis', 'Cheissy', 'Neimar', 'Grisaida', 'Franchesca',
            'Kerallys', 'Yesenia', 'Lilibeth', 'Leobel', 'Yirly', 'Deivy', 'Vivenciolo ', 'Elder', 'Jerimar',
            'Kenry', 'Nelsaida', 'Yormari', 'Auralin', 'Yamilet', 'Elixy', 'Seiberling', 'Everfit', 'Marevi',
            'Esmérida', 'Zaida', 'Willésika', 'Imalay', 'Euridys', 'Yedoska', 'Yogualsi', 'Yexana', 'Gemsimys',
            'Haynhect', 'Yasterliski', 'Levis', 'Eukenedy', 'Nehymalit', 'Chelsy', 'Zugehidi', 'Zugendy',
            'Single', 'Yorelis', 'Yorbelis', 'Jorbis', 'Yordanik', 'Solsirec', 'Miriela', 'Sorensorina', 'Greysa',
            'Miriana', 'Udemixon', 'Noraisola', 'Harinton', 'Icieli', 'Yraimisg', 'Royr', 'Silkys', 'Nonoska',
            'Yasmildy', 'Lodval', 'Nandú', 'Uni García', 'Líxido', 'Analtilo', 'Ayessa', 'Bernily', 'Yinling Rodríguez',
            'Maiker', 'Marnie', 'Vicsay', 'Laiolkis', 'Hecsaidy', 'Yaruby', 'Zunell', 'Ayerín', 'Fresa', 'Urimare',
            'Laudy', 'Winibey', 'Ever Nieto', 'Siempre Mora', 'Eiker', 'Braian', 'Tailor', 'Kenyerlin', 'Jean Kenedy',
            'Kerry', 'Schmeider Graterol', 'Kervin', 'Richarly', 'Cleyder', 'Remiyarmery', 'Yunis', 'Edgembert',
            'Haysamar', 'Osleandry', 'Zousire', 'Waryolis', 'Glingni', 'Greity', 'Windym', 'Keileen', 'Shonatan',
            'Enwil', 'Greissy', 'Jahynsel', 'Yuquency', 'Kleister', 'Yonexis', 'Derwin', 'Johefrank', 'Deiby',
            'Shaydemar', 'Jenfer', 'Juisfreira', 'Leudis', 'Yorley', 'Yurkleym', 'Jeckson',
        ];

        $apellidos = [
            'Martinez','Espinal','Perez','Fernandez','Futrille','Arcia','Maldonado','Perozo','Rodriguez','Garcia',
            'Rojas','Coronado','Lopez','Vega','Paredes','Romero','Leon','Flores','Viera','Arguello','Villasmil',
            'González', 'Rodríguez', 'Gómez', 'Fernández', 'López', 'Díaz', 'Martínez', 'Pérez', 'García', 'Sánchez', 'Romero',
            'Sosa', 'Álvarez', 'Torres', 'Ruiz', 'Ramírez', 'Flores', 'Acosta', 'Benítez', 'Medina', 'Suárez', 'Herrera',
            'Aguirre', 'Pereyra', 'Gutiérrez', 'Giménez/Jiménez', 'Molina', 'Silva', 'Castro', 'Rojas', 'Ortiz', 'Núñez',
            'Luna', 'Juárez', 'Cabrera', 'Ríos', 'Ferreyra', 'Godoy', 'Morales', 'Domínguez', 'Moreno', 'Peralta', 'Vega',
            'Carrizo', 'Quiroga', 'Castillo', 'Ledesma', 'Muñoz', 'Ojeda', 'Ponce', 'Vera', 'Vázquez', 'Villalba', 'Cardozo',
            'Navarro', 'Ramos', 'Arias', 'Coronel', 'Córdoba', 'Figueroa', 'Correa', 'Cáceres', 'Vargas', 'Maldonado',
            'Mansilla', 'Farías', 'Rivero', 'Paz', 'Miranda', 'Roldán', 'Méndez', 'Lucero', 'Cruz', 'Hernández', 'Agüero',
            'Páez', 'Blanco', 'Mendoza', 'Barrios', 'Escobar', 'Ávila', 'Soria', 'Leiva', 'Acuña', 'Martín', 'Maidana',
            'Moyano', 'Campos', 'Olivera', 'Duarte', 'Soto', 'Franco', 'Bravo', 'Valdez', 'Toledo', 'Velázquez', 'Montenegro',
            'Leguizamón', 'Chávez', 'Arce',
        ];

        $nombresJuridicos = [
            'Q AREPAS C.A.','INVERSIONES ELEFANTE','EMPORIO CHACAITO','CREDIX SA','PASTELERIA EL PANAL','PC ACTUAL',
            'LT 2015','CALLE NICATA CA','SUPERMERCADO EL CHINITO','PANADERIA TRUFFAS','JUANCHO\'S BURGUER',
            'COMIDA RAPIDA EL PLAYERO','ARCOS DORADOS DE VENEZUELA','LOCATEL CA','FARMATODO CA',
        ];

        $abcedario = [
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        ];

        DB::table('pagos')->delete();

        $users = DB::table('users')->get();
        foreach($users as $usu){
            for ($i = 0; $i < rand(5, 100); $i++) {

                $isNatural = rand(0,1) == 0 ? 'V' : 'J';

                $tmpMonto = (rand(1, 100)) . (intval(rand(1, 99) / 10) * 10) . (intval(rand(10, 99) / 100) * 100);
                $montosArray = Pago::getMontosArray((double)$tmpMonto);

                $payment = Pago::create([
                    'usu_id' => $usu->usu_id,
                    'pag_estatus' => Pago::$EST_PORCONCILIAR,
                    'pag_monto' => $montosArray['montoTransaccion'],
                    'pag_concepto' => $products[rand(0,sizeof($products)-1)],
                    'pag_nombretc' => (
                        $isNatural == 'V' ?
                        $nombres[rand(0,sizeof($nombres)-1)].' '.$apellidos[rand(0,sizeof($apellidos)-1)] :
                        $nombresJuridicos[rand(0,sizeof($nombresJuridicos)-1)]),
                    'pag_cith' => $isNatural . rand(3, 20) . rand(100000, 999999) . ($isNatural == 'V' ? '' : rand(0,9)),
                    'pag_montocomision' => $montosArray['montoComision'],
                    'pag_montocomisiontmc' => $montosArray['montoComisionTmc'],
                    'pag_montocomisionpasarela' => $montosArray['montoComisionPasarela'],
                    'pag_montoimpuesto' => $montosArray['montoImpuesto'],
                    'pag_montototalcliente' => $montosArray['montoTotalCliente'],
                    'pag_fechacreacion' => date('Y-' . rand(1, 2) . '-' . rand(1, 28) . ' ' . rand(1, 23) . ':i:s'),
                ]);

                $pgh = PagoHistorico::create([
                    'pag_id' => $payment->pag_id,
                    'pgh_columna' => 'pag_estatus',
                    'pgh_valor' => Pago::$EST_PENDIENTE,
                    'usu_id' => $usu->usu_id,
                ]);

                $pgh = PagoHistorico::create([
                    'pag_id' => $payment->pag_id,
                    'pgh_columna' => 'pag_estatus',
                    'pgh_valor' => $payment->pag_estatus,
                    'usu_id' => $usu->usu_id,
                ]);

                if (rand(0, 1) == 1) {

                    $payment->pag_estatus = Pago::$EST_CONCILIADO;
                    $payment->pag_codigoconciliacion =
                        $abcedario[rand(0, sizeof($abcedario) - 1)] .
                        $abcedario[rand(0, sizeof($abcedario) - 1)] .
                        rand(0, 9) .
                        $abcedario[rand(0, sizeof($abcedario) - 1)] .
                        rand(0, 9) .
                        $abcedario[rand(0, sizeof($abcedario) - 1)] .
                        $abcedario[rand(0, sizeof($abcedario) - 1)] .
                        rand(0, 9);
                    $payment->save();
                    
                    $pgh = PagoHistorico::create([
                        'pag_id' => $payment->pag_id,
                        'pgh_columna' => 'pag_estatus',
                        'pgh_valor' => Pago::$EST_CONCILIADO,
                        'usu_id' => $usu->usu_id,
                        'pgh_fechacreacion' => date('Y-' . rand(3, 4) . '-' . rand(1, 30) . ' ' . rand(1, 23) . ':' . rand(10, 59) . ':s'),
                        'pgh_descripcion' => $payment->pag_codigoconciliacion,
                    ]);
                }
            }
        }

    }

}

