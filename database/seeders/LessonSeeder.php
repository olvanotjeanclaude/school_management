<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = [
            [
                "name" => "PROJE GELİŞTİRME VE YÖNETİMİ",
                "code" => "BIL4102",
                "credit" => rand(2, 4),
                "semester" => rand(1, 8),
                "user_id" => $this->generateTeacher(),
                "goal" => "<p>Bu ders, Bilgisayar ve Öğretim Teknolojileri Eğitimi Bölümü öğrencilerinin; bilimsel bir araştırma yapabilmeleri için gerekli temel bilgi, yetenek ve uzmanlık bilgisini kazanmalarını sağlamaktır.</p>"
            ],
            [
                "name" => "MOBİL PROGRAMLAMA",
                "code" => "BIL4110",
                "credit" => rand(2, 4),
                "semester" => rand(1, 5),
                "user_id" => $this->generateTeacher(),
                "goal" => "<p>Bu dersin amacı öğretmen adaylarının mobil programlamaya ait temel kavramlarla ilgili bilgi sahibi olmasını sağlamak ve ayrıca mobil programlamaya yönelik yazılım geliştirme araçlarını kullanarak sensörler, emülatörler, ses, resim ve video, harita servisleri ve veritabanlarını içeren uygulamalar geliştirebilmelerini sağlamaktır.</p>"
            ],
            [
                "name" => "TÜRK MUSİKİSİ",
                "code" => "GKS0017",
                "credit" => rand(2, 4),
                "semester" => rand(1, 8),
                "user_id" => $this->generateTeacher(),
                "goal" => "<p>Türk müziğini tanımak, Ritmik ezgisel dizisel özelliklerini tanımak, Türk müziği söyleme istek ve alışısı sağlamak.</p>"
            ],
            [
                "name" => "ÖĞRETMENLİK UYGULAMASI II",
                "code" => "MBBILSB",
                "credit" => 10,
                "semester" => rand(1, 8),
                "user_id" => $this->generateTeacher(),
                "goal" => "<p>Bu dersin amacı sınıf öğretmeni adaylarının öğretmenlik ile ilgili kazanmış oldukları bilgi ve becerileri uygulama okullarında bizzat eğitim öğretim faaliyetlerine katılarak deneyim elde etmelerini sağlamak, böylece öğretmenlik bilgi ve becerilerini geliştirmektir.</p>"
            ],
            [
                "name" => "KAPSAYICI EĞİTİM",
                "code" => "MBS0013B",
                "credit" => rand(2, 4),
                "semester" => rand(1, 8),
                "user_id" => 1,
                "goal" => fake()->paragraphs(3, true)
            ],
            [
                "name" => "OKULLARDA REHBERLİK",
                "code" => "MBZ0013BİLRESFR",
                "credit" => rand(2, 4),
                "semester" => rand(1, 8),
                "user_id" => 1,
                "goal" => "<p>Rehberlik dersinin temel amacı, değişik eğitim kademelerinde görev alacak öğretmen adaylarının kişisel, eğitsel ve mesleki rehberlik konusunda gerekli bilgi, beceri ve tutum kazanmalarına yardım etmektir. Bu ders kapsamında öğrenci kişilik hizmetleri ve rehberliğin bu hizmetler içindeki yeri, rehberliğin tanımı, türleri ve amacı, okullarda rehberlik hizmetleri (psikolojik danışma, oryantasyon, bireyi tanıma, bilgi toplama ve yayma, yöneltme ve yerleştirme, izleme ve değerlendirme, konsültasyon), rehberliğin temel ilkeleri, eğitsel rehberlik, kişisel rehberlik, mesleki rehberlik ve bireyi tanıma teknikleri gibi konular ele alınmaktadır</p>"
            ],
        ];

        foreach ($lessons as $lesson) {
           $newLesson=  Lesson::create($lesson);

           $newLesson->teachers()->attach($this->randomTeacherId());
           $newLesson->students()->sync($this->studentIds());
        }
    }

    private function generateTeacher()
    {
        return User::where("type", User::TYPES["teacher"])->inRandomOrder()->first()?->id ?? 1;
    }

    private function randomTeacherId(){
        return User::Teachers()->inRandomOrder()->first()->id;
    }

    private function studentIds(){
        return User::Students()->pluck("id")->toArray();
    }
}
