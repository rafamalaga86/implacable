<?php

use Illuminate\Database\Seeder;
use App\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * @var data
     */
    protected $data = [
            [2, 'Sentadillas', 'free weights', 'http://i.blogs.es/93405c/sentadilla/1366_2000.jpg'],
            [2, 'Peso Muerto', 'free weights', 'http://www.menshealthlatam.com/wp-content/uploads/2018/07/PESO-MUERTO-CON-BARRA-770x393.jpg'],
            [2, 'Dominadas', 'calisthenics', 'http://fabianentrenador.files.wordpress.com/2019/01/captura-4.png'],
            [2, 'Press Banca Plana', 'free weights', 'http://www.muscularstore.es/blog/wp-content/uploads/2019/05/Press-de-banca-con-barra.jpg'],
            [2, 'Press Banca Inclinada', 'free weights', 'http://espowerlifting.com/wp-content/uploads/2019/12/press-inclinado-foto-480x429.png'],
            [2, 'Remo con barra', 'free weights', 'http://eresfitness.com/wp-content/uploads/2019/07/Remo-con-barra-recta-de-pie.jpg'],
            [2, 'Extensión de triceps en polea', 'free weights', 'http://eresfitness.com/wp-content/uploads/2019/06/Extensi%C3%B3n-de-tr%C3%ADceps-en-polea-alta-MUSCULOS-INVOLUCRADOS.jpg'],
            [2, 'Press de biceps con mancuernas', 'free weights', 'http://eresfitness.com/wp-content/uploads/2019/05/Curl-alternado-con-mancuerna.jpg'],
            [2, 'Press de biceps con barra', 'free weights', 'http://eresfitness.com/wp-content/uploads/2019/05/Curl-con-barra-parado.jpg'],
            [2, 'Press militar con barra', 'free weights', 'http://scorusfitness.com/wp-content/uploads/press-militar.png'],
            [2, 'Fondos de pecho','calisthenics','http://www.feda.net/wp-content/uploads/2019/02/dip.jpg'],
            [2, 'Face Pulls (Jalones a la cara)','free weights','http://www.burnthefatinnercircle.com/members/images/1733b.jpg?cb=20191017074728'],
            [2, 'Extensión de tobillos sentado (Sóleo)','free weights','http://eresfitness.com/wp-content/uploads/2019/05/Elevaci%C3%B3n-de-talones-sentado-con-m%C3%A1quina.jpg'],
            [2, 'Extensión de gemelos','free weights','http://theworkoutdigest.com/wp-content/uploads/2019/04/standing-calf-raise-muscles-worked-768x545.jpg'],
            [2, 'Elevaciones laterales con mancuerna','free weights','http://deportes.pucp.edu.pe/wp-content/uploads/2020/06/101696317_3641011195916127_7872289777821679616_o-920x341.png'],
            [2, 'Peso muerto rumano','free weights','http://www.bodysmile.es/wp-content/uploads/2019/08/PESO-MUERTO-R.png'],
            [2, 'Flexión clásica','calisthenics','http://web4.practicavida.es/wp-content/uploads/2013/09/flexiones-de-brazos-en-el-suelo-1.jpg'],
            [2, 'Flexión inclinada','calisthenics','http://hiitacademy.com/wp-content/uploads/2015/01/incline_push_ups-900x389.jpg'],
            [2, 'Flexión con manos separadas','calisthenics','http://static.wixstatic.com/media/80fd0d_22649981df7c4409be27af455f847497.png/v1/fill/w_204,h_135,al_c,q_85,usm_0.66_1.00_0.01/80fd0d_22649981df7c4409be27af455f847497.webp'],
            [2, 'Flexión con manos juntas (o diamante)','calisthenics','http://www.ilovefit.org/wp-content/uploads/2017/07/flexiones-diamante.jpg'],
            [2, 'Flexión en "T"','calisthenics','http://www.street-workouts.com/wp-content/uploads/2016/04/T-push-up.jpg'],
            [2, 'Flexión sobre balón','calisthenics','http://www.ejercicios.org/images/flexion-con-balon-medicinal-en-una-mano1.jpg'],
            [2, 'Flexión Superman','calisthenics','http://img1.hkrtcdn.com/ff/superman-abs.png'],
            [2, 'Flexión con palmada','calisthenics','http://smartfitjay.files.wordpress.com/2014/08/clap-push-ups.jpg'],
            [2, 'Flexión espartana','calisthenics','http://s2.dmcdn.net/AFTB1/1280x720-1EM.jpg'],
            [2, 'Flexión profunda','calisthenics','http://bodybuilding-wizard.com/wp-content/uploads/2018/09/push-ups-between-two-chairs-300x214.jpg'],
            [2, 'Fondos en paralelas','calisthenics','http://www.ilovefit.org/wp-content/uploads/2017/07/dips-o-paralelas-triceps-1024x426.jpg'],
            [2, 'Extensión de triceps','calisthenics','http://decalistenia.biz/wp-content/uploads/2018/02/Extensi%C3%B3n-de-tr%C3%ADceps-en-barra.jpg'],
            [2, 'Flexión vertical','calisthenics','http://1.bp.blogspot.com/-uS2OdFl7DyY/VwPXgtKMSlI/AAAAAAAACM4/0mSXTs-LA9kxGtXy_Q8s7MvS2SJN3SUfQ/s320/HSPU-560x361.jpg'],
            [2, 'Flexión hindú','calisthenics','http://www.burnthefatinnercircle.com/members/images/2001b.png?cb=20200430123849'],
            [2, 'Bombardero en picado','calisthenics','http://images.squarespace-cdn.com/content/v1/579b62c66b8f5b8f495eae56/1477948689719-ZUKMGIC49H51YOFHL5I2/ke17ZwdGBToddI8pDm48kCFT8sZTg2TkkyQgcYSceIdZw-zPPgdn4jUwVcJE1ZvWhcwhEtWJXoshNdA9f1qD7Xj1nVWs2aaTtWBneO2WM-uHQFsQuBzBq_an-I7LqDPOMqEb0jP1LLaVjRrdOjU9qA/image-asset.jpeg?format=300w'],
            [2, 'Dominada clásica','calisthenics','http://www.ilovefit.org/wp-content/uploads/2017/09/dominadas-1024x426.jpg'],
            [2, 'Dominada con manos juntas','calisthenics','http://www.ilovefit.org/wp-content/uploads/2017/09/dominadas-manos-juntas.jpg'],
            [2, 'Dominada con agarre supino','calisthenics','http://www.ilovefit.org/wp-content/uploads/2017/07/dominadas-agarre-supino-biceps.jpg'],
            [2, 'Semidominada horizontal','calisthenics','http://propositosaludable.com/wp-content/uploads/semidominada-horizontal.jpg'],
            [2, 'Dominada horizontal','calisthenics','http://www.ilovefit.org/wp-content/uploads/2017/09/dominada-horizontal.png'],
            [2, 'Dominada comando','calisthenics','http://www.ilovefit.org/wp-content/uploads/2017/09/dominada-comando.jpg'],
            [2, 'Estiramiento espalda Superman','calisthenics','http://cdn1.coachmag.co.uk/sites/coachmag/files/styles/insert_main_wide_image/public/2016/10/lower_back_workout_superman.jpg?itok=R7zdkgpy'],
            [2, 'Muscle-up','calisthenics','http://imgr1.menshealth.de/Ein-Muscle-up-trainiert-nahezu-den-gesamten-Oberkoerper-inlineImageCOdc-26d9f820-53567.jpg'],
            [2, 'Sentadilla con una pierna (Pistol Squat)','calisthenics','http://as1.ftcdn.net/jpg/01/13/53/72/500_F_113537232_V6lP4jzLmmBowQ7iIkTsGHo8zsu4BjJW.jpg'],
            [2, 'Sentadilla con salto','calisthenics','http://sportsandmartialarts.com/wp-content/uploads/2020/03/Squat-Jump.jpg'],
            [2, 'Saltos sobre plataforma','calisthenics','http://goodwillrunners.net/wordpress/wp-content/uploads/2016/05/salto-177x300.jpg'],
            [2, 'Rodilla a pecho','calisthenics','http://vivabasquet.com/wp-content/uploads/2015/01/22.jpg'],
            [2, 'Desplantes','calisthenics','http://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/766/images/new-lunges-02-1492274161.jpg?resize=768:*'],
            [2, 'Desplantes laterales','calisthenics','http://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/766/images/new-lunges-06-1492274161.jpg?resize=768:*'],
            [2, 'Desplantes con salto','calisthenics','http://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/0904-lunge-jumps-0-1441032989.jpg?resize=768:*'],
            [2, 'Elevación de talones','calisthenics','http://i.blogs.es/9780b6/gemelos2/1366_2000.jpg'],
            [2, 'Sentadilla búlgara','calisthenics','http://i.pinimg.com/originals/33/c5/86/33c586578da56db64f3ec63e4a82a40f.png'],
            [2, 'Abdominales clásico','calisthenics','http://i2.wp.com/pilicuadrado.com/wp-content/uploads/2014/06/crunch-abdominal1.jpg?w=550&ssl=1'],
            [2, 'Levantamiento de piernas colgado (piernas encogidas)','calisthenics','http://www.deportesdeciudad.com/wp-content/uploads/2018/07/elevaciones-pierna-con-rotacio%CC%81n-1024x913.png'],
            [2, 'Levantamiento de piernas colgado (piernas estiradas)','calisthenics','https://i.blogs.es/a6cd11/elevacion-piernas/1366_2000.jpg'],
            [2, 'Plancha','calisthenics','http://www.got-big.de/Blog/wp-content/uploads/2017/04/plank-frau-titel-300x157.jpg'],
            [2, 'Plancha con flexión','calisthenics','http://www.entrenamientos.com/media/cache/exercise_375/uploads/exercise/plancha-flexion-brazos-1548%20.png'],
            [2, 'Plancha lateral','calisthenics','http://1.bp.blogspot.com/-qirm5gWlXnU/XouDlb9WJDI/AAAAAAAACeE/oqx2ArtqqpgtYwkT838AILLnytBarRz5wCNcBGAsYHQ/s400/plancha-lateral.jpg'],
            [2, 'Plancha lateral con flexión','calisthenics','https://www.hola.com/imagenes/belleza/20171215111399/ejercicios-plancha-abdominales-perfectos-belleza/0-542-340/flacidezabdominal2--a.jpg'],
            [2, 'Levantamiento de caderas','calisthenics','http://www.yomeentreno.com/wp-content/uploads/2019/12/Glute-Bridge-Exercise.jpg'],
            [2, 'Lumbares','calisthenics','http://www.adicciongym.com/wp-content/uploads/2017/07/revestimiento-2.jpg'],
            [2, 'Abdominales en "V"','calisthenics','http://www.comunidadfitnessecuador.com/wp-content/uploads/2015/12/rsz_pasos_de_la_vit_sit_ups.jpg'],
            [2, 'Flexión S&M','calisthenics','http://shape180fitness.files.wordpress.com/2014/02/pushup-birddog.jpg'],
            [2, 'Bicicleta','calisthenics','http://blog.nutritienda.com/wp-content/uploads/2016/05/Abdominales-Bicicleta-1-e1463136600661-1024x907.jpg'],
            // [2, 'Pies a manos','calisthenics',''],
            [2, 'Bandera','calisthenics','http://www.masmusculo.com/blog/wp-content/uploads/2016/02/9539693d-e1a5-44e9-bb5f-ac67630a14f2-300x165.jpg'],
            [2, 'Burpees','calisthenics','http://risetoit.co.za/wp-content/uploads/2013/04/Burpees.jpg'],
            [2, 'Escaladores','calisthenics','http://as1.ftcdn.net/jpg/01/13/53/72/500_F_113537216_z42NZkhpPGcIUkHQxbZSJanfVe9NuOhk.jpg'],
            // [2, 'Escaladores inversos','calisthenics',''],
            [2, 'Jumping Jacks','calisthenics','http://fitpass-images.s3.amazonaws.com/content_blog_inner_64A71045.png'],
            [2, 'Flexión a plancha','calisthenics','http://entrenar.me/blog/wp-content/uploads/2017/03/ejercicios-de-triceps-plancha-281x300.jpg'],
            [2, 'Levantamientos de rodilla','calisthenics','http://mujer.fitness/wp-content/uploads/2018/02/Los-levantamientos-de-rodillas-o-high-knees.jpg'],
            [2, 'Pino puente','calisthenics','http://www.wikihow.com/images/thumb/e/e8/Do-a-Front-Walkover-Step-1-Version-8.jpg/v4-728px-Do-a-Front-Walkover-Step-1-Version-8.jpg.webp'],
            [2, 'Esprintar','calisthenics','http://images.contentstack.io/v3/assets/blt45c082eaf9747747/blt1e6294d9666ea432/5de0bb60940c0264137801e3/SPRINT_LOWB_HEAD.jpg?format=pjpg&auto=webp&fit=crop&quality=76&width=1232&height=496'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $row) {
            Exercise::create([
                'user_id'   => $row[0],
                'name'      => $row[1],
                'category'  => $row[2],
                'image_url' => $row[3]
            ]);
        }
    }
}
