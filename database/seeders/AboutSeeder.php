<?php

namespace Database\Seeders;

use App\Models\{About,AboutTranslation};
use Illuminate\{Database\Seeder,Support\Facades\DB};

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $aboutDatas = [
                'az' => ['description' => 'Zərifliyin və gözəlliyin simvoluna çevrilmiş «PINLIGHT» mağazası daim yeni işləri ilə sizlərə və evinizə sevinc bəxş edir.  Ondan yenilik gözləyənləri gözəlliyə qərq edir. Bu məkanda peşəkar əməyin nəticəsi olan «Swarowski» nümunələrinə biganə qalmaq qeyri-mümkündür.  «Swarowski» büllurunun hər üç növündən hazırlanmış modern, klassik və avanqard tərzdə çilçıraq, bra, torşer, spot və müxtəlif aksessuarları xüsusi zövqlə seçilirək alıcılarımıza təqdim olunur.  İtaliya, İspaniya, Almaniya, Avstriya, Hollandiya istehsalı olan bu çilçıraqların evinizə gözəllik və zəriflik bəxş edən işığı könlünüzü isidəcək.  «Swarowski» büllurun vətəni sayılan Avstriyadan cox zərif, incəvə xüsusi bir formada hazırlanan çilçıraqlar, niderlandiyalı William Brand və Annet van Egmondun və digər məşhur dizaynerlərin sizlər üçün hazırladıqları ekskluziv əl işləri heyrət doğuracaq.Avropadan gətirdiyimiz bu aksessuarlarda peşənin incəsənətə döndüyü anı müşahidə edəcəksiniz.
     Bundan başqa, mərmərin vətəni sayılan İspaniyadan gətirilmiş, istənilən ölçü və formada oyma üsulu ilə hazırlanmış çilçıraqlar sizlərdə xoş təssürat oyadacaq.


Sevgi zəriflikdir, zəriflik zövqdür. Zövq peşəkarlıqdır, peşəkarlıq isə «PINLIGHT» -dadır.

Sizi satış-sərgi salonlarımızda görməyə həmişə şadıq və əminik ki, arzularınızın çilçıraqlarını bizdə tapacaqsınız cünki biz bütün zövqləri nəzərə almışıq ki, hec kimi biganə qoymayaq.', 'title' => 'PINLIGHT – Evinizin nuru!'],
                'en' => ['description' => '"PINLIGHT" store, which has become a symbol of elegance and beauty, always brings joy to you and your home with new works. He immerses those who expect novelty from him in beauty. In this place, it is impossible to remain indifferent to the Swarovski samples, which are the result of professional work. Modern, classic and avant-garde style chandeliers, bras, floor lamps, spotlights and various accessories made of all three types of "Swarowski" crystal are presented to our customers with special taste. The light of these chandeliers made in Italy, Spain, Germany, Austria, Holland will warm your heart, giving your home beauty and elegance. Chandeliers made in a very elegant, delicate and special form from Austria, which is considered the homeland of "Swarowski" crystal, exclusive handmade works prepared for you by William Brand and Annet van Egmond from the Netherlands and other famous designers will amaze you. In these accessories, which we brought from Europe, you will observe the moment when profession turns into art.
     In addition, chandeliers of any size and shape, imported from Spain, which is considered the homeland of marble, will make a pleasant impression on you.


Love is elegance, elegance is pleasure. Pleasure is professionalism, and professionalism is in "PINLIGHT".

We are always happy to see you in our sales-exhibition halls and we are sure that you will find the chandeliers of your dreams with us, because we have taken into account all tastes so that we do not leave anyone indifferent.', 'title' => 'PINLIGHT – The light of your home!'],
                'ru' => ['description' => 'Магазин «ПИНЛАЙТ», ставший символом элегантности и красоты, всегда радует вас и ваш дом новыми работами. Он погружает в красоту тех, кто ждет от него новизны. В этом месте невозможно остаться равнодушным к образцам Swarovski, которые являются результатом профессиональной работы. Современные, классические и авангардные люстры, бра, торшеры, точечные светильники и различные аксессуары из всех трех видов хрусталя «Сваровски» представлены нашим покупателям с особым вкусом. Свет этих люстр производства Италии, Испании, Германии, Австрии, Голландии согреет ваше сердце, придав вашему дому красоту и элегантность. Вас удивят люстры, выполненные в очень элегантной, нежной и особенной форме из Австрии, которая считается родиной хрусталя «Swarowski», эксклюзивные работы ручной работы, подготовленные для вас Уильямом Брандом и Аннет ван Эгмонд из Нидерландов и другими известными дизайнерами. В этих аксессуарах, которые мы привезли из Европы, вы заметите тот момент, когда профессия превращается в искусство.
     Кроме того, на вас произведут приятное впечатление люстры любых размеров и форм, привезенные из Испании, которая считается родиной мрамора.


Любовь — это элегантность, элегантность — это удовольствие. Удовольствие - это профессионализм, а профессионализм в "ПИНЛАЙТ".

Мы всегда рады видеть Вас в наших торгово-выставочных залах и уверены, что Вы найдете у нас люстры своей мечты, ведь мы учли все вкусы, чтобы никого не оставить равнодушным.', 'title' => 'PINLIGHT – Свет вашего дома!'],
            ];
            $about = new About();
            $about->save();
            foreach (active_langs() as $lang) {
                $trans = new AboutTranslation();
                $trans->about_id = $about->id;
                $trans->title = $aboutDatas[$lang->code]['title'];
                $trans->description = $aboutDatas[$lang->code]['description'];
                $trans->locale = $lang->code;
                $trans->save();
            }
        });
    }
}
