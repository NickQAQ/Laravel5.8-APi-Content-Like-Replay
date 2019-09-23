<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;

class WordController extends Controller
{
    public function toWord(Request $request)
    {

        $excelData = [
            'companyName' => '裂变',
            'Designated' => '王琴文',
            'cardCode' => 34093484,
            'id' => 123,
            'date-year' => 2019,
            'date-month' => 10,
            'date-day' => 18

        ];
        //引入php word
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        //设置默认样式
        $phpWord->setDefaultFontName('微软雅黑');//字体
        $phpWord->setDefaultFontSize(10.5);//字号

        //添加页面
        $section = $phpWord->createSection();

        //添加目录
        $styleTOC  = ['tabLeader' => \PhpOffice\PhpWord\Style\TOC::TABLEADER_DOT];
        $styleFont = ['spaceAfter' => 60, 'name' => 'Tahoma', 'size' => 12];
        $section->addTOC($styleFont, $styleTOC);

        //添加标题（居中）
        $section->addText('                             微信认证申请公函',
            [
                'bold' => true,
                'color' => 'black',
                'size' => 16,
                'name' => '微软雅黑'
            ]
        );

        $section->addTextBreak();//换行符0
        //$section->addTextBreak(5);//多个换行符

        //指定的样式
        $section->addText(
            '       申请主体',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false
            ]
        );
        $section->addText(
            $excelData['companyName'],
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
                'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_DASH
            ]
        );
        $section->addText(
            '同意授权委托指定人员',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
            ]
        );
        $section->addText(
            $excelData['DesignatedPerson'],
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
                'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_DASH
            ]
        );
        $section->addText(
            '（身份证号码：）',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
            ]
        );
        $section->addText(
            $excelData['cardCode'],
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
                'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_DASH
            ]
        );
        $section->addText(
            '作为帐号联系人，以申请主体名义不可撤销地申请微信（公众号/小程序/开放平台）帐号（原始ID）',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
            ]
        );
        $section->addText(
            $excelData['id'],
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
                'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_DASH
            ]
        );
        $section->addText(
            '认证服务，并授权其负责该帐号的内容维护、开发维护及运营管理。',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
            ]
        );
        $section->addTextBreak();//换行符
        $section->addText(
            '       1. 申请主体及初始申请注册主体同意：申请主体帐号在进行认证服务时，若提交的主体信息与初始申请注册主体信息不一致，应当填写初始申请注册主体姓名并在本公函落款处签章确认，在帐号资质审核成功之后，申请主体帐号的使用权属于通过资质审核的申请主体，该帐号自注册时其产生的一切权利义务均由该主体承担，该帐号所获得的所有收益、权限均归认证后的主体享有，且所有运营活动都必须以该主体对外开展；',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false
            ]
        );
        $section->addTextBreak();//换行符
        $section->addText(
            '       2. 申请主体承诺：提交给腾讯的认证资料真实无误，并不可撤销地授权腾讯及其委托的第三方审核机构对提交的资料进行甄别核实，申请主体理解并同意，一经申请即产生腾讯及其委托的第三方审核机构的审核成本，故所交纳的认证审核服务费用将不因认证结果、申请主体是否提出撤回申请等因素而退回。同时，帐号内容维护、开发维护及运营管理遵守国家法律法规、政策及《微信公众平台服务协议》、《微信公众平台认证服务协议》、《微信小程序平台服务条款》、《微信开放平台开发者服务协议》、《微信开放平台开发者资质认证服务协议》的相关规定。如违反上述承诺，责任自行承担。',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false
            ]
        );
        $section->addTextBreak();//换行符
        $section->addText(
            '       3. 申请主体清楚知悉并同意，本认证服务仅对该帐号所提交的认证资料的真实性、合法性进行书面甄别核实，其功能、权限是否开通、帐号能否发布等均需遵守对应业务平台为此所制定的专项规则，而不与认证审核结果存在直接关联。',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false
            ]
        );
        $section->addTextBreak();//换行符
        $section->addTextBreak();//换行符
        $section->addText(
            '       申请主体对以上认证申请信息表填写信息及申请公函内容确认无异议。  ',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false
            ]
        );
        $section->addTextBreak();//换行符
        $section->addText(
            '       申请主体加盖公章：',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false
            ]
        );
        $section->addTextBreak();//换行符
        $section->addText(
            '       需加盖与主体一致的单位公章，无公章的个体工商户可加盖法人私章或法人签字。',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
                'color' => '#808080',
                'spaceAfter' => 20,

            ]
        );
        $section->addTextBreak();//换行符
        $section->addText(
            '       帐号联系人签字：                               ',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false
            ]
        );
        $section->addTextBreak();//换行符
        $section->addText(
            '                                                                                                   ',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false
            ]
        );
        $section->addText(
            $excelData['date-year'],
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
                'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_DASH
            ]
        );
        $section->addText(
            '年'.$excelData['date-month'].'月'.$excelData['date-day'].'日',
            [
                'name' => '微软雅黑',
                'size' => 10.5,
                'bold' => false,
            ]
        );

        //自定义样式
//        $myStyle = 'myStyle';
//        $phpWord->addFontStyle(
//            $myStyle,
//            [
//                'name' => '微软雅黑',
//                'size' => 13,
//                'color' => '#808080',
//                'bold' => true,
//                'spaceAfter' => 20,
//            ]
//        );
//        $section->addText('Hello Laravel!', $myStyle);
//        $section->addText('Hello Vue.js!', $myStyle);

        //添加文本资源
//        $textrun = $section->createTextRun();
//        $textrun->addText('加粗', ['bold' => true]);
//        $section->addTextBreak();//换行符
//        $textrun->addText('倾斜', ['italic' => true]);
//        $section->addTextBreak();//换行符
//        $textrun->addText('字体颜色', ['color' => 'AACC00']);

        //超链接
//        $linkStyle = ['color' => '0000FF', 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE];
//        $phpWord->addLinkStyle('myLinkStyle', $linkStyle);
//        $section->addLink('http://www.baidu.com', '百度一下', 'myLinkStyle');
//        $section->addLink('http://www.baidu.com', null, 'myLinkStyle');

        //添加图片
//        $imageStyle = ['width' => 480, 'height' => 640, 'align' => 'center'];
//        $section->addImage('./img/t1.jpg', $imageStyle);
//        $section->addImage('./img/t2.jpg',$imageStyle);

        //添加标题
//        $phpWord->addTitleStyle(1, ['bold' => true, 'color' => '1BFF32', 'size' => 38, 'name' => 'Verdana']);
//        $section->addTitle('标题1', 1);
//        $section->addTitle('标题2', 1);
//        $section->addTitle('标题3', 1);




        //页眉与页脚
        $header = $section->createHeader();
        $footer = $section->createFooter();
        $header->addPreserveText('');
//        $footer->addPreserveText('页脚 - 页数 {PAGE} - {NUMPAGES}.');

        //生成的文档为Word2007
        $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save('./word/hello.docx');

    }

    public function openWord(Request $request)
    {

        $filePath = './temp.docx' ;
        $temp = new \PhpOffice\PhpWord\TemplateProcessor($filePath);

        $temp->setValue('companyName','裂变开发部');
        $temp->setValue('designated','王亲吻');
        $temp->setValue('cardCode','123456789');
        $temp->setValue('id','123');
        $temp->setValue('date_year','2020');
        $temp->setValue('date_month','20');
        $temp->setValue('date_day','30');
        $temp->saveAs('./测试.docx');


    }

    public function test()
    {
        $excelData = [
            0 => [
                "companyName" =>  "name1",
                "DesignatedPerson" =>  "name2",
                "cardCode" => "123456789",
                "id" =>  "795416321",
                "date-year" => 2019,
                "date-month" => 10,
                "date-day" => 18,
            ],
            1 =>[
                "companyName" =>  "name3",
                "DesignatedPerson" =>  "name4",
                "cardCode" => 123456789,
                "id" => "78932123",
                "date-year" => 2018,
                "date-month" => 9,
                "date-day" => 17,
            ]
        ];


        $filePath = './temp.docx' ;
        $temp = new \PhpOffice\PhpWord\TemplateProcessor($filePath);
        foreach ($excelData as $key => $item) {
            //Settings::setZipClass(\PhpOffice\PhpWord\Settings::PCLZIP);
            $temp->setValue('companyName',$item['companyName']);
            $temp->setValue('designated',$item['DesignatedPerson']);
            $temp->setValue('cardCode',$item['cardCode']);
            $temp->setValue('id',$item['id']);
            $temp->setValue('date_year',$item['date-year']);
            $temp->setValue('date_month',$item['date-month']);
            $temp->setValue('date_day',$item['date-day']);
            $path = './word/'.time().'.docx';
            $temp->save($path);

//            $file1 = fopen($path, "r");
//            // 输入文件标签
//            Header("Content-type: application/octet-stream");
//            Header("Accept-Ranges: bytes");
//            Header("Accept-Length:".filesize($path));
//            Header("Content-Disposition: attachment;filename=" . date("YmdHis").'.doc');
//            ob_clean();     // 重点！！！
//            flush();        // 重点！！！！可以清除文件中多余的路径名以及解决乱码的问题：
//            //输出文件内容
//            //读取文件内容并直接输出到浏览器
//            echo fread($file1, filesize($path));
//            fclose($file1);

            //saveAs(ROOT_PATH.'public'.DS.'words'.DS.$key.'-'.time().'.docx');
        }
        //将根目录下的word是文件夹全部压缩
//        $result = ROOT_PATH.'public'.DS.'words'.DS.'words.doc';
//        return json(['msg'=>'文件打包成功','path' => $result]);
    }

}
