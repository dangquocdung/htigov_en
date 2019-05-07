<?php
use App\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newCountry = new Country();
        $newCountry->code = "AL";
        $newCountry->title_vi = "ألبانيا";
        $newCountry->title_en = "Albania";
        $newCountry->tel = "355";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "DZ";
        $newCountry->title_vi = "الجزائر";
        $newCountry->title_en = "Algeria";
        $newCountry->tel = "213";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AS";
        $newCountry->title_vi = "ساموا الأمريكية";
        $newCountry->title_en = "American Samoa";
        $newCountry->tel = "1-684";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AD";
        $newCountry->title_vi = "أندورا";
        $newCountry->title_en = "Andorra";
        $newCountry->tel = "376";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AO";
        $newCountry->title_vi = "أنغولا";
        $newCountry->title_en = "Angola";
        $newCountry->tel = "244";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AI";
        $newCountry->title_vi = "أنغيلا";
        $newCountry->title_en = "Anguilla";
        $newCountry->tel = "1-264";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "VI";
        $newCountry->title_vi = "الأرجنتين";
        $newCountry->title_en = "Argentina";
        $newCountry->tel = "54";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AM";
        $newCountry->title_vi = "أرمينيا";
        $newCountry->title_en = "Armenia";
        $newCountry->tel = "374";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AW";
        $newCountry->title_vi = "أروبا";
        $newCountry->title_en = "Aruba";
        $newCountry->tel = "297";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AU";
        $newCountry->title_vi = "أستراليا";
        $newCountry->title_en = "Australia";
        $newCountry->tel = "61";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AT";
        $newCountry->title_vi = "النمسا";
        $newCountry->title_en = "Austria";
        $newCountry->tel = "43";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AZ";
        $newCountry->title_vi = "أذربيجان";
        $newCountry->title_en = "Azerbaijan";
        $newCountry->tel = "994";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BS";
        $newCountry->title_vi = "جزر البهاما";
        $newCountry->title_en = "Bahamas";
        $newCountry->tel = "1-242";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BH";
        $newCountry->title_vi = "البحرين";
        $newCountry->title_en = "Bahrain";
        $newCountry->tel = "973";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BD";
        $newCountry->title_vi = "بنغلاديش";
        $newCountry->title_en = "Bangladesh";
        $newCountry->tel = "880";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BB";
        $newCountry->title_vi = "بربادوس";
        $newCountry->title_en = "Barbados";
        $newCountry->tel = "1-246";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BY";
        $newCountry->title_vi = "روسيا البيضاء";
        $newCountry->title_en = "Belarus";
        $newCountry->tel = "375";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BE";
        $newCountry->title_vi = "بلجيكا";
        $newCountry->title_en = "Belgium";
        $newCountry->tel = "32";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BZ";
        $newCountry->title_vi = "بليز";
        $newCountry->title_en = "Belize";
        $newCountry->tel = "501";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BJ";
        $newCountry->title_vi = "بنين";
        $newCountry->title_en = "Benin";
        $newCountry->tel = "229";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BM";
        $newCountry->title_vi = "برمودا";
        $newCountry->title_en = "Bermuda";
        $newCountry->tel = "1-441";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BT";
        $newCountry->title_vi = "بوتان";
        $newCountry->title_en = "Bhutan";
        $newCountry->tel = "975";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BO";
        $newCountry->title_vi = "بوليفيا";
        $newCountry->title_en = "Bolivia";
        $newCountry->tel = "591";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BA";
        $newCountry->title_vi = "البوسنة والهرسك";
        $newCountry->title_en = "Bosnia and Herzegovina";
        $newCountry->tel = "387";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BW";
        $newCountry->title_vi = "بوتسوانا";
        $newCountry->title_en = "Botswana";
        $newCountry->tel = "267";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BR";
        $newCountry->title_vi = "البرازيل";
        $newCountry->title_en = "Brazil";
        $newCountry->tel = "55";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "VG";
        $newCountry->title_vi = "جزر فيرجن البريطانية";
        $newCountry->title_en = "British Virgin Islands";
        $newCountry->tel = "1-284";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IO";
        $newCountry->title_vi = "إقليم المحيط الهندي البريطاني";
        $newCountry->title_en = "British Indian Ocean Territory";
        $newCountry->tel = "246";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BN";
        $newCountry->title_vi = "بروناي دار السلام";
        $newCountry->title_en = "Brunei Darussalam";
        $newCountry->tel = "673";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BG";
        $newCountry->title_vi = "بلغاريا";
        $newCountry->title_en = "Bulgaria";
        $newCountry->tel = "359";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BF";
        $newCountry->title_vi = "بوركينا فاسو";
        $newCountry->title_en = "Burkina Faso";
        $newCountry->tel = "226";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "BI";
        $newCountry->title_vi = "بوروندي";
        $newCountry->title_en = "Burundi";
        $newCountry->tel = "257";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KH";
        $newCountry->title_vi = "كمبوديا";
        $newCountry->title_en = "Cambodia";
        $newCountry->tel = "855";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CM";
        $newCountry->title_vi = "الكاميرون";
        $newCountry->title_en = "Cameroon";
        $newCountry->tel = "237";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CA";
        $newCountry->title_vi = "كندا";
        $newCountry->title_en = "Canada";
        $newCountry->tel = "1";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CV";
        $newCountry->title_vi = "الرأس الأخضر";
        $newCountry->title_en = "Cape Verde";
        $newCountry->tel = "238";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KY";
        $newCountry->title_vi = "جزر كايمان";
        $newCountry->title_en = "Cayman Islands";
        $newCountry->tel = "1-345";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CF";
        $newCountry->title_vi = "افريقيا الوسطى";
        $newCountry->title_en = "Central African Republic";
        $newCountry->tel = "236";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TD";
        $newCountry->title_vi = "تشاد";
        $newCountry->title_en = "Chad";
        $newCountry->tel = "235";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CL";
        $newCountry->title_vi = "تشيلي";
        $newCountry->title_en = "Chile";
        $newCountry->tel = "56";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CN";
        $newCountry->title_vi = "الصين";
        $newCountry->title_en = "China";
        $newCountry->tel = "86";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "HK";
        $newCountry->title_vi = "هونغ كونغ";
        $newCountry->title_en = "Hong Kong";
        $newCountry->tel = "852";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MO";
        $newCountry->title_vi = "ماكاو";
        $newCountry->title_en = "Macao";
        $newCountry->tel = "853";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CX";
        $newCountry->title_vi = "جزيرة الكريسماس";
        $newCountry->title_en = "Christmas Island";
        $newCountry->tel = "61";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CC";
        $newCountry->title_vi = "جزر كوكوس (كيلينغ)";
        $newCountry->title_en = "Cocos (Keeling) Islands";
        $newCountry->tel = "61";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CO";
        $newCountry->title_vi = "كولومبيا";
        $newCountry->title_en = "Colombia";
        $newCountry->tel = "57";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KM";
        $newCountry->title_vi = "جزر القمر";
        $newCountry->title_en = "Comoros";
        $newCountry->tel = "269";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CK";
        $newCountry->title_vi = "جزر كوك";
        $newCountry->title_en = "Cook Islands";
        $newCountry->tel = "682";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CR";
        $newCountry->title_vi = "كوستا ريكا";
        $newCountry->title_en = "Costa Rica";
        $newCountry->tel = "506";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "HR";
        $newCountry->title_vi = "كرواتيا";
        $newCountry->title_en = "Croatia";
        $newCountry->tel = "385";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CU";
        $newCountry->title_vi = "كوبا";
        $newCountry->title_en = "Cuba";
        $newCountry->tel = "53";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CY";
        $newCountry->title_vi = "قبرص";
        $newCountry->title_en = "Cyprus";
        $newCountry->tel = "357";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CZ";
        $newCountry->title_vi = "الجمهورية التشيكية";
        $newCountry->title_en = "Czech Republic";
        $newCountry->tel = "420";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "DK";
        $newCountry->title_vi = "الدنمارك";
        $newCountry->title_en = "Denmark";
        $newCountry->tel = "45";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "DJ";
        $newCountry->title_vi = "جيبوتي";
        $newCountry->title_en = "Djibouti";
        $newCountry->tel = "253";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "DM";
        $newCountry->title_vi = "دومينيكا";
        $newCountry->title_en = "Dominica";
        $newCountry->tel = "1-767";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "DO";
        $newCountry->title_vi = "جمهورية الدومينيكان";
        $newCountry->title_en = "Dominican Republic";
        $newCountry->tel = "1-809";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "EC";
        $newCountry->title_vi = "الاكوادور";
        $newCountry->title_en = "Ecuador";
        $newCountry->tel = "593";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "EG";
        $newCountry->title_vi = "مصر";
        $newCountry->title_en = "Egypt";
        $newCountry->tel = "20";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SV";
        $newCountry->title_vi = "السلفادور";
        $newCountry->title_en = "El Salvador";
        $newCountry->tel = "503";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GQ";
        $newCountry->title_vi = "غينيا الاستوائية";
        $newCountry->title_en = "Equatorial Guinea";
        $newCountry->tel = "240";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ER";
        $newCountry->title_vi = "إريتريا";
        $newCountry->title_en = "Eritrea";
        $newCountry->tel = "291";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "EE";
        $newCountry->title_vi = "استونيا";
        $newCountry->title_en = "Estonia";
        $newCountry->tel = "372";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ET";
        $newCountry->title_vi = "أثيوبيا";
        $newCountry->title_en = "Ethiopia";
        $newCountry->tel = "251";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "FO";
        $newCountry->title_vi = "جزر فارو";
        $newCountry->title_en = "Faroe Islands";
        $newCountry->tel = "298";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "FJ";
        $newCountry->title_vi = "فيجي";
        $newCountry->title_en = "Fiji";
        $newCountry->tel = "679";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "FI";
        $newCountry->title_vi = "فنلندا";
        $newCountry->title_en = "Finland";
        $newCountry->tel = "358";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "FR";
        $newCountry->title_vi = "فرنسا";
        $newCountry->title_en = "France";
        $newCountry->tel = "33";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GF";
        $newCountry->title_vi = "جيانا الفرنسية";
        $newCountry->title_en = "French Guiana";
        $newCountry->tel = "689";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GA";
        $newCountry->title_vi = "الغابون";
        $newCountry->title_en = "Gabon";
        $newCountry->tel = "241";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GM";
        $newCountry->title_vi = "غامبيا";
        $newCountry->title_en = "Gambia";
        $newCountry->tel = "220";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GE";
        $newCountry->title_vi = "جورجيا";
        $newCountry->title_en = "Georgia";
        $newCountry->tel = "995";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "DE";
        $newCountry->title_vi = "ألمانيا";
        $newCountry->title_en = "Germany";
        $newCountry->tel = "49";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GH";
        $newCountry->title_vi = "غانا";
        $newCountry->title_en = "Ghana";
        $newCountry->tel = "233";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GI";
        $newCountry->title_vi = "جبل طارق";
        $newCountry->title_en = "Gibraltar";
        $newCountry->tel = "350";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GR";
        $newCountry->title_vi = "يونان";
        $newCountry->title_en = "Greece";
        $newCountry->tel = "30";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GL";
        $newCountry->title_vi = "غرينلاند";
        $newCountry->title_en = "Greenland";
        $newCountry->tel = "299";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GD";
        $newCountry->title_vi = "غرينادا";
        $newCountry->title_en = "Grenada";
        $newCountry->tel = "1-473";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GU";
        $newCountry->title_vi = "غوام";
        $newCountry->title_en = "Guam";
        $newCountry->tel = "1-671";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GT";
        $newCountry->title_vi = "غواتيمالا";
        $newCountry->title_en = "Guatemala";
        $newCountry->tel = "502";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GN";
        $newCountry->title_vi = "غينيا";
        $newCountry->title_en = "Guinea";
        $newCountry->tel = "224";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GW";
        $newCountry->title_vi = "غينيا-بيساو";
        $newCountry->title_en = "Guinea-Bissau";
        $newCountry->tel = "245";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GY";
        $newCountry->title_vi = "غيانا";
        $newCountry->title_en = "Guyana";
        $newCountry->tel = "592";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "HT";
        $newCountry->title_vi = "هايتي";
        $newCountry->title_en = "Haiti";
        $newCountry->tel = "509";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "HN";
        $newCountry->title_vi = "هندوراس";
        $newCountry->title_en = "Honduras";
        $newCountry->tel = "504";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "HU";
        $newCountry->title_vi = "هنغاريا";
        $newCountry->title_en = "Hungary";
        $newCountry->tel = "36";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IS";
        $newCountry->title_vi = "أيسلندا";
        $newCountry->title_en = "Iceland";
        $newCountry->tel = "354";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IN";
        $newCountry->title_vi = "الهند";
        $newCountry->title_en = "India";
        $newCountry->tel = "91";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ID";
        $newCountry->title_vi = "أندونيسيا";
        $newCountry->title_en = "Indonesia";
        $newCountry->tel = "62";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IR";
        $newCountry->title_vi = "جمهورية إيران الإسلامية";
        $newCountry->title_en = "Iran, Islamic Republic of";
        $newCountry->tel = "98";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IQ";
        $newCountry->title_vi = "العراق";
        $newCountry->title_en = "Iraq";
        $newCountry->tel = "964";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IE";
        $newCountry->title_vi = "أيرلندا";
        $newCountry->title_en = "Ireland";
        $newCountry->tel = "353";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IM";
        $newCountry->title_vi = "جزيرة مان";
        $newCountry->title_en = "Isle of Man";
        $newCountry->tel = "44-1624";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IL";
        $newCountry->title_vi = "إسرائيل";
        $newCountry->title_en = "Israel";
        $newCountry->tel = "972";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "IT";
        $newCountry->title_vi = "إيطاليا";
        $newCountry->title_en = "Italy";
        $newCountry->tel = "39";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "JM";
        $newCountry->title_vi = "جامايكا";
        $newCountry->title_en = "Jamaica";
        $newCountry->tel = "1-876";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "JP";
        $newCountry->title_vi = "اليابان";
        $newCountry->title_en = "Japan";
        $newCountry->tel = "81";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "JE";
        $newCountry->title_vi = "جيرسي";
        $newCountry->title_en = "Jersey";
        $newCountry->tel = "44-1534";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "JO";
        $newCountry->title_vi = "الأردن";
        $newCountry->title_en = "Jordan";
        $newCountry->tel = "962";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KZ";
        $newCountry->title_vi = "كازاخستان";
        $newCountry->title_en = "Kazakhstan";
        $newCountry->tel = "7";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KE";
        $newCountry->title_vi = "كينيا";
        $newCountry->title_en = "Kenya";
        $newCountry->tel = "254";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KI";
        $newCountry->title_vi = "كيريباس";
        $newCountry->title_en = "Kiribati";
        $newCountry->tel = "686";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KW";
        $newCountry->title_vi = "الكويت";
        $newCountry->title_en = "Kuwait";
        $newCountry->tel = "965";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KG";
        $newCountry->title_vi = "قيرغيزستان";
        $newCountry->title_en = "Kyrgyzstan";
        $newCountry->tel = "996";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LV";
        $newCountry->title_vi = "لاتفيا";
        $newCountry->title_en = "Latvia";
        $newCountry->tel = "371";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LB";
        $newCountry->title_vi = "لبنان";
        $newCountry->title_en = "Lebanon";
        $newCountry->tel = "961";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LS";
        $newCountry->title_vi = "ليسوتو";
        $newCountry->title_en = "Lesotho";
        $newCountry->tel = "266";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LR";
        $newCountry->title_vi = "ليبيريا";
        $newCountry->title_en = "Liberia";
        $newCountry->tel = "231";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LY";
        $newCountry->title_vi = "ليبيا";
        $newCountry->title_en = "Libya";
        $newCountry->tel = "218";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LI";
        $newCountry->title_vi = "ليشتنشتاين";
        $newCountry->title_en = "Liechtenstein";
        $newCountry->tel = "423";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LT";
        $newCountry->title_vi = "ليتوانيا";
        $newCountry->title_en = "Lithuania";
        $newCountry->tel = "370";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LU";
        $newCountry->title_vi = "لوكسمبورغ";
        $newCountry->title_en = "Luxembourg";
        $newCountry->tel = "352";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MK";
        $newCountry->title_vi = "مقدونيا، جمهورية";
        $newCountry->title_en = "Macedonia";
        $newCountry->tel = "389";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MG";
        $newCountry->title_vi = "مدغشقر";
        $newCountry->title_en = "Madagascar";
        $newCountry->tel = "261";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MW";
        $newCountry->title_vi = "ملاوي";
        $newCountry->title_en = "Malawi";
        $newCountry->tel = "265";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MY";
        $newCountry->title_vi = "ماليزيا";
        $newCountry->title_en = "Malaysia";
        $newCountry->tel = "60";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MV";
        $newCountry->title_vi = "جزر المالديف";
        $newCountry->title_en = "Maldives";
        $newCountry->tel = "960";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ML";
        $newCountry->title_vi = "مالي";
        $newCountry->title_en = "Mali";
        $newCountry->tel = "223";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MT";
        $newCountry->title_vi = "مالطا";
        $newCountry->title_en = "Malta";
        $newCountry->tel = "356";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MH";
        $newCountry->title_vi = "جزر مارشال";
        $newCountry->title_en = "Marshall Islands";
        $newCountry->tel = "692";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MR";
        $newCountry->title_vi = "موريتانيا";
        $newCountry->title_en = "Mauritania";
        $newCountry->tel = "222";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MU";
        $newCountry->title_vi = "موريشيوس";
        $newCountry->title_en = "Mauritius";
        $newCountry->tel = "230";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "YT";
        $newCountry->title_vi = "مايوت";
        $newCountry->title_en = "Mayotte";
        $newCountry->tel = "262";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MX";
        $newCountry->title_vi = "المكسيك";
        $newCountry->title_en = "Mexico";
        $newCountry->tel = "52";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "FM";
        $newCountry->title_vi = "ولايات ميكرونيزيا الموحدة";
        $newCountry->title_en = "Micronesia";
        $newCountry->tel = "691";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MD";
        $newCountry->title_vi = "مولدوفا";
        $newCountry->title_en = "Moldova";
        $newCountry->tel = "373";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MC";
        $newCountry->title_vi = "موناكو";
        $newCountry->title_en = "Monaco";
        $newCountry->tel = "377";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MN";
        $newCountry->title_vi = "منغوليا";
        $newCountry->title_en = "Mongolia";
        $newCountry->tel = "976";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ME";
        $newCountry->title_vi = "الجبل الأسود";
        $newCountry->title_en = "Montenegro";
        $newCountry->tel = "382";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MS";
        $newCountry->title_vi = "مونتسيرات";
        $newCountry->title_en = "Montserrat";
        $newCountry->tel = "1-664";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MA";
        $newCountry->title_vi = "المغرب";
        $newCountry->title_en = "Morocco";
        $newCountry->tel = "212";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MZ";
        $newCountry->title_vi = "موزمبيق";
        $newCountry->title_en = "Mozambique";
        $newCountry->tel = "258";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "MM";
        $newCountry->title_vi = "ميانمار";
        $newCountry->title_en = "Myanmar";
        $newCountry->tel = "95";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NA";
        $newCountry->title_vi = "ناميبيا";
        $newCountry->title_en = "Namibia";
        $newCountry->tel = "264";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NR";
        $newCountry->title_vi = "ناورو";
        $newCountry->title_en = "Nauru";
        $newCountry->tel = "674";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NP";
        $newCountry->title_vi = "نيبال";
        $newCountry->title_en = "Nepal";
        $newCountry->tel = "977";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NL";
        $newCountry->title_vi = "هولندا";
        $newCountry->title_en = "Netherlands";
        $newCountry->tel = "31";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AN";
        $newCountry->title_vi = "جزر الأنتيل الهولندية";
        $newCountry->title_en = "Netherlands Antilles";
        $newCountry->tel = "599";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NC";
        $newCountry->title_vi = "كاليدونيا الجديدة";
        $newCountry->title_en = "New Caledonia";
        $newCountry->tel = "687";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NZ";
        $newCountry->title_vi = "نيوزيلندا";
        $newCountry->title_en = "New Zealand";
        $newCountry->tel = "64";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NI";
        $newCountry->title_vi = "نيكاراغوا";
        $newCountry->title_en = "Nicaragua";
        $newCountry->tel = "505";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NE";
        $newCountry->title_vi = "النيجر";
        $newCountry->title_en = "Niger";
        $newCountry->tel = "227";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NG";
        $newCountry->title_vi = "نيجيريا";
        $newCountry->title_en = "Nigeria";
        $newCountry->tel = "234";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NU";
        $newCountry->title_vi = "نيوي";
        $newCountry->title_en = "Niue";
        $newCountry->tel = "683";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "NO";
        $newCountry->title_vi = "النرويج";
        $newCountry->title_en = "Norway";
        $newCountry->tel = "47";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "OM";
        $newCountry->title_vi = "عمان";
        $newCountry->title_en = "Oman";
        $newCountry->tel = "968";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PK";
        $newCountry->title_vi = "باكستان";
        $newCountry->title_en = "Pakistan";
        $newCountry->tel = "92";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PW";
        $newCountry->title_vi = "بالاو";
        $newCountry->title_en = "Palau";
        $newCountry->tel = "680";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PS";
        $newCountry->title_vi = "فلسطين";
        $newCountry->title_en = "Palestinian";
        $newCountry->tel = "972";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PA";
        $newCountry->title_vi = "بناما";
        $newCountry->title_en = "Panama";
        $newCountry->tel = "507";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PY";
        $newCountry->title_vi = "باراغواي";
        $newCountry->title_en = "Paraguay";
        $newCountry->tel = "595";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PE";
        $newCountry->title_vi = "بيرو";
        $newCountry->title_en = "Peru";
        $newCountry->tel = "51";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PH";
        $newCountry->title_vi = "الفلبين";
        $newCountry->title_en = "Philippines";
        $newCountry->tel = "63";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PN";
        $newCountry->title_vi = "بيتكيرن";
        $newCountry->title_en = "Pitcairn";
        $newCountry->tel = "870";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PL";
        $newCountry->title_vi = "بولندا";
        $newCountry->title_en = "Poland";
        $newCountry->tel = "48";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PT";
        $newCountry->title_vi = "البرتغال";
        $newCountry->title_en = "Portugal";
        $newCountry->tel = "351";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PR";
        $newCountry->title_vi = "بويرتو ريكو";
        $newCountry->title_en = "Puerto Rico";
        $newCountry->tel = "1-787";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "QA";
        $newCountry->title_vi = "قطر";
        $newCountry->title_en = "Qatar";
        $newCountry->tel = "974";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "RO";
        $newCountry->title_vi = "رومانيا";
        $newCountry->title_en = "Romania";
        $newCountry->tel = "40";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "RU";
        $newCountry->title_vi = "الفيدرالية الروسية";
        $newCountry->title_en = "Russian Federation";
        $newCountry->tel = "7";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "RW";
        $newCountry->title_vi = "رواندا";
        $newCountry->title_en = "Rwanda";
        $newCountry->tel = "250";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SH";
        $newCountry->title_vi = "سانت هيلينا";
        $newCountry->title_en = "Saint Helena";
        $newCountry->tel = "290";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "KN";
        $newCountry->title_vi = "سانت كيتس ونيفيس";
        $newCountry->title_en = "Saint Kitts and Nevis";
        $newCountry->tel = "1-869";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LC";
        $newCountry->title_vi = "سانت لوسيا";
        $newCountry->title_en = "Saint Lucia";
        $newCountry->tel = "1-758";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "PM";
        $newCountry->title_vi = "سان بيار وميكلون";
        $newCountry->title_en = "Saint Pierre and Miquelon";
        $newCountry->tel = "508";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "VC";
        $newCountry->title_vi = "سانت فنسنت وجزر غرينادين";
        $newCountry->title_en = "Saint Vincent and Grenadines";
        $newCountry->tel = "1-784";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "WS";
        $newCountry->title_vi = "ساموا";
        $newCountry->title_en = "Samoa";
        $newCountry->tel = "685";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SM";
        $newCountry->title_vi = "سان مارينو";
        $newCountry->title_en = "San Marino";
        $newCountry->tel = "378";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ST";
        $newCountry->title_vi = "ساو تومي وبرينسيبي";
        $newCountry->title_en = "Sao Tome and Principe";
        $newCountry->tel = "239";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SA";
        $newCountry->title_vi = "المملكة العربية السعودية";
        $newCountry->title_en = "Saudi Arabia";
        $newCountry->tel = "966";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SN";
        $newCountry->title_vi = "السنغال";
        $newCountry->title_en = "Senegal";
        $newCountry->tel = "221";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "RS";
        $newCountry->title_vi = "صربيا";
        $newCountry->title_en = "Serbia";
        $newCountry->tel = "381";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SC";
        $newCountry->title_vi = "سيشيل";
        $newCountry->title_en = "Seychelles";
        $newCountry->tel = "248";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SL";
        $newCountry->title_vi = "سيرا ليون";
        $newCountry->title_en = "Sierra Leone";
        $newCountry->tel = "232";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SG";
        $newCountry->title_vi = "سنغافورة";
        $newCountry->title_en = "Singapore";
        $newCountry->tel = "65";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SK";
        $newCountry->title_vi = "سلوفاكيا";
        $newCountry->title_en = "Slovakia";
        $newCountry->tel = "421";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SI";
        $newCountry->title_vi = "سلوفينيا";
        $newCountry->title_en = "Slovenia";
        $newCountry->tel = "386";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SB";
        $newCountry->title_vi = "جزر سليمان";
        $newCountry->title_en = "Solomon Islands";
        $newCountry->tel = "677";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SO";
        $newCountry->title_vi = "الصومال";
        $newCountry->title_en = "Somalia";
        $newCountry->tel = "252";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ZA";
        $newCountry->title_vi = "جنوب أفريقيا";
        $newCountry->title_en = "South Africa";
        $newCountry->tel = "27";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ES";
        $newCountry->title_vi = "إسبانيا";
        $newCountry->title_en = "Spain";
        $newCountry->tel = "34";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "LK";
        $newCountry->title_vi = "سيريلانكا";
        $newCountry->title_en = "Sri Lanka";
        $newCountry->tel = "94";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SD";
        $newCountry->title_vi = "السودان";
        $newCountry->title_en = "Sudan";
        $newCountry->tel = "249";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SR";
        $newCountry->title_vi = "سورينام";
        $newCountry->title_en = "Suriname";
        $newCountry->tel = "597";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SJ";
        $newCountry->title_vi = "جزر سفالبارد وجان ماين";
        $newCountry->title_en = "Svalbard and Jan Mayen Islands";
        $newCountry->tel = "47";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SZ";
        $newCountry->title_vi = "سوازيلاند";
        $newCountry->title_en = "Swaziland";
        $newCountry->tel = "268";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SE";
        $newCountry->title_vi = "السويد";
        $newCountry->title_en = "Sweden";
        $newCountry->tel = "46";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "CH";
        $newCountry->title_vi = "سويسرا";
        $newCountry->title_en = "Switzerland";
        $newCountry->tel = "41";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "SY";
        $newCountry->title_vi = "سوريا";
        $newCountry->title_en = "Syrian Arab Republic";
        $newCountry->tel = "963";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TW";
        $newCountry->title_vi = "تايوان، جمهورية الصين";
        $newCountry->title_en = "Taiwan, Republic of China";
        $newCountry->tel = "886";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TJ";
        $newCountry->title_vi = "طاجيكستان";
        $newCountry->title_en = "Tajikistan";
        $newCountry->tel = "992";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TZ";
        $newCountry->title_vi = "تنزانيا";
        $newCountry->title_en = "Tanzania";
        $newCountry->tel = "255";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TH";
        $newCountry->title_vi = "تايلاند";
        $newCountry->title_en = "Thailand";
        $newCountry->tel = "66";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TG";
        $newCountry->title_vi = "توغو";
        $newCountry->title_en = "Togo";
        $newCountry->tel = "228";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TK";
        $newCountry->title_vi = "توكيلاو";
        $newCountry->title_en = "Tokelau";
        $newCountry->tel = "690";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TO";
        $newCountry->title_vi = "تونغا";
        $newCountry->title_en = "Tonga";
        $newCountry->tel = "676";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TT";
        $newCountry->title_vi = "ترينداد وتوباغو";
        $newCountry->title_en = "Trinidad and Tobago";
        $newCountry->tel = "1-868";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TN";
        $newCountry->title_vi = "تونس";
        $newCountry->title_en = "Tunisia";
        $newCountry->tel = "216";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TR";
        $newCountry->title_vi = "تركيا";
        $newCountry->title_en = "Turkey";
        $newCountry->tel = "90";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TM";
        $newCountry->title_vi = "تركمانستان";
        $newCountry->title_en = "Turkmenistan";
        $newCountry->tel = "993";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TC";
        $newCountry->title_vi = "جزر تركس وكايكوس";
        $newCountry->title_en = "Turks and Caicos Islands";
        $newCountry->tel = "1-649";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "TV";
        $newCountry->title_vi = "توفالو";
        $newCountry->title_en = "Tuvalu";
        $newCountry->tel = "688";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "UG";
        $newCountry->title_vi = "أوغندا";
        $newCountry->title_en = "Uganda";
        $newCountry->tel = "256";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "UA";
        $newCountry->title_vi = "أوكرانيا";
        $newCountry->title_en = "Ukraine";
        $newCountry->tel = "380";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "AE";
        $newCountry->title_vi = "الإمارات العربية المتحدة";
        $newCountry->title_en = "United Arab Emirates";
        $newCountry->tel = "971";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "GB";
        $newCountry->title_vi = "المملكة المتحدة";
        $newCountry->title_en = "United Kingdom";
        $newCountry->tel = "44";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "US";
        $newCountry->title_vi = "الولايات المتحدة الأمريكية";
        $newCountry->title_en = "United States of America";
        $newCountry->tel = "1";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "UY";
        $newCountry->title_vi = "أوروغواي";
        $newCountry->title_en = "Uruguay";
        $newCountry->tel = "598";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "UZ";
        $newCountry->title_vi = "أوزبكستان";
        $newCountry->title_en = "Uzbekistan";
        $newCountry->tel = "998";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "VU";
        $newCountry->title_vi = "فانواتو";
        $newCountry->title_en = "Vanuatu";
        $newCountry->tel = "678";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "VE";
        $newCountry->title_vi = "فنزويلا";
        $newCountry->title_en = "Venezuela";
        $newCountry->tel = "58";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "VN";
        $newCountry->title_vi = "فيتنام";
        $newCountry->title_en = "Viet Nam";
        $newCountry->tel = "84";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "WF";
        $newCountry->title_vi = "واليس وفوتونا";
        $newCountry->title_en = "Wallis and Futuna Islands";
        $newCountry->tel = "681";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "YE";
        $newCountry->title_vi = "اليمن";
        $newCountry->title_en = "Yemen";
        $newCountry->tel = "967";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ZM";
        $newCountry->title_vi = "زامبيا";
        $newCountry->title_en = "Zambia";
        $newCountry->tel = "260";
        $newCountry->save();


        $newCountry = new Country();
        $newCountry->code = "ZW";
        $newCountry->title_vi = "زيمبابوي";
        $newCountry->title_en = "Zimbabwe";
        $newCountry->tel = "263";
        $newCountry->save();
    }
}
