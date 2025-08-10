<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        AboutUs::create([
            'title_ar' => 'من نحن',
            'title_en' => 'About Us',
            'desc_ar' => 'من خلال عمل اكثر من 400 خطة تسويقية لأصحاب الأنشطة التجارية وجدت عدة مشكلات تواجههم في الخطط التسويقية:

الخطط تقدم لهم بشكل منقوص وسطحي تغيب منه تفاصيل كثيرة ومهمة.
الخطط تركز على السوشيال ميديا وتهمل نقاط تسويقية لها أولوية في الترتيب.
الأفكار والأنشطة المقدمة تكون أكاديمية وليست واقعية لا تناسب السوق العملي.
لا يوجد من يتابع معك في التنفيذ مما يفشل الخطة حتى وإن كانت جيدة.
غياب البحث التسويقي العميق.
لهذا اخترت أن أقدم لك خطط تسويقية أشمل وأدق تتضمن 150 عنصر تسويقي (50 صفحة) سنعمل على تطويرهم بخطوات عملية واضحة وسأشرف على تنفيذها، وسأدربك على فهمها والتعامل معها طوال عملك بعد ذلك.

ملحوظة:
هذه ليست خطة سوشيال ميديا فقط، بل السوشيال ميديا هي عنصر واحد من بين 150 عنصر. يوجد ملف تعريفي مجاني يشرح التفاصيل يمكن طلبه عند التواصل.
لست مقدم خدمة وإنما استشاري مخلص لعميل يستحق الأفضل.',
            'desc_en' => 'After creating over 400 marketing plans for business owners, I found several common issues they face:

Plans are often incomplete and superficial, missing many important details.
They focus heavily on social media and neglect higher-priority marketing elements.
Ideas and activities are academic rather than practical, making them unfit for the real market.
There is no execution follow-up, so even good plans end up failing.
Lack of deep market research.
That’s why I chose to offer you a more comprehensive and detailed marketing plan including 150 strategic elements (spanning 50 pages). We’ll work on them step by step, and I’ll personally supervise your implementation and train you to follow them long-term.

Note:
This is not a social media plan — social media is just one of the 150 elements. A free introductory file is available explaining everything in detail. Feel free to request it.
Im not just a service provider — Im a dedicated consultant for clients who deserve the best.',



        ]);
    }
}
