<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phpBook = Book::create([
            'category_id' => Category::where('name', 'Programming')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'Mastering PHP',
            'description' => 'Mastering PHP is a comprehensive guide for web developers who want to build robust and scalable back-end systems using PHP. This book takes a practical approach to teaching readers how to design, develop, and deploy PHP-based applications that can handle heavy traffic and complex user interactions. Starting with the basics of PHP programming, the book covers the advanced features of PHP that are essential for building back-end systems, including object-oriented programming, database integration, security and more!',
            'number_of_copies' => '220',
            'number_of_pages' => '350',
            'price' => '20',
            'isbn' => '100000089',
            'cover_image' => 'images/backend.jpeg'
        ]);
        $phpBook->authors()->attach(Author::where('name', 'Eng.Mostafa Mahfouz')->first());

        $design = Book::create([
            'category_id' => Category::where('name', 'Design')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Intro To Design',
            'description' => 'Design Fundamentals is a concise and accessible introduction to the world of design. This book covers the basic principles and concepts of design, including color theory, typography, layout, and composition. It also provides practical tips and techniques for creating effective designs for print and digital media.',
            'number_of_copies' => '180',
            'number_of_pages' => '200',
            'price' => '15',
            'isbn' => '100000060',
            'cover_image' => 'images/design3.png'
        ]);
        $design->authors()->attach(Author::where('name', 'Nour')->first());

        $web = Book::create([
            'category_id' => Category::where('name', 'Programming')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'Web Development 101',
            'description' => 'Web Development 101 is an accessible and beginner-friendly guide to the world of web development. This book covers the fundamental concepts and techniques of building websites, including HTML, CSS, JavaScript, and responsive design. Whether you are new to web development or looking to expand your knowledge, this book is a great starting point. With its practical approach and easy-to-follow examples',
            'number_of_copies' => '190',
            'number_of_pages' => '290',
            'price' => '19',
            'isbn' => '100000023',
            'cover_image' => 'images/web.jpeg'
        ]);
        $web->authors()->attach(Author::where('name', 'Eng.Mohamed Amr')->first());

        
        $eMarketing = Book::create([
            'category_id' => Category::where('name', 'E-marketing')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Digital Marketing 101: Strategies for Success',
            'description' => 'Digital Marketing 101 is a practical guide to the world of e-marketing. This book covers the essential concepts and techniques for creating effective digital marketing campaigns, including email marketing, social media marketing, search engine optimization (SEO), pay-per-click (PPC) advertising, and content marketing. It also provides an overview of analytics tools and techniques for measuring the success of your campaigns.',
            'number_of_copies' => '200',
            'number_of_pages' => '240',
            'price' => '17',
            'isbn' => '100000016',
            'cover_image' => 'images/e-marketing.jpeg'
        ]);
        $eMarketing->authors()->attach(Author::where('name', 'Samar')->first());

        $cryptocurrency = Book::create([
            'category_id' => Category::where('name', 'Cryptocurrency')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Understanding Cryptocurrencies',
            'description' => 'Understanding Cryptocurrencies is a comprehensive introduction to the world of digital currencies. This book covers the essential concepts and techniques for understanding and investing in cryptocurrencies, including Bitcoin, Ethereum, and other popular altcoins. It also provides an overview of blockchain technology and its applications beyond cryptocurrencies.',
            'number_of_copies' => '165',
            'number_of_pages' => '260',
            'price' => '22',
            'isbn' => '100000063',
            'cover_image' => 'images/crypto.jpeg'
        ]);
        $cryptocurrency->authors()->attach(Author::where('name', 'Mohamed')->first());

        
        $frontend = Book::create([
            'category_id' => Category::where('name', 'Programming')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'Front-End Development Essentials',
            'description' => 'Front-End Development Essentials is a practical guide to building modern and responsive web applications using HTML, CSS, and JavaScript. This book covers the essential concepts and techniques for creating user-friendly and engaging front-end interfaces, including web design principles, UI/UX design, responsive design, and accessibility.',
            'number_of_copies' => '195',
            'number_of_pages' => '340',
            'price' => '24',
            'isbn' => '100000043',
            'cover_image' => 'images/frontend.jpeg'
        ]);
        $frontend->authors()->attach(Author::where('name', 'Eslam')->first());

        $ai = Book::create([
            'category_id' => Category::where('name', 'AI')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'AI 101: Introduction to Artificial Intelligence',
            'description' => 'AI 101 is a comprehensive introduction to the world of artificial intelligence. This book covers the essential concepts and techniques for understanding and building intelligent systems, including machine learning, neural networks, natural language processing, and computer vision.',
            'number_of_copies' => '145',
            'number_of_pages' => '440',
            'price' => '30',
            'isbn' => '100000023',
            'cover_image' => 'images/ai3.jpeg'
        ]);
        $ai->authors()->attach(Author::where('name', 'Mostafa')->first());

        $neuralNetwork = Book::create([
            'category_id' => Category::where('name', 'AI')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Neural Networks Demystified',
            'description' => 'Neural Networks Demystified is an accessible and beginner-friendly guide to understanding neural networks. This book covers the fundamental concepts and techniques of building and training neural networks, including feedforward and recurrent neural networks, backpropagation, and regularization techniques.',
            'number_of_copies' => '187',
            'number_of_pages' => '430',
            'price' => '28',
            'isbn' => '100000013',
            'cover_image' => 'images/neural-network.jpeg'
        ]);
        $neuralNetwork->authors()->attach(Author::where('name', 'Sara')->first());

        $entrepreneurship3 = Book::create([
            'category_id' => Category::where('name', 'Entrepreneurship')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Entrepreneurship 101: For Beginners',
            'description' => 'Entrepreneurship 101 is a practical guide to starting and running your own business. This book covers the essential concepts and techniques for launching and growing a successful business, including market research, business planning, marketing and sales, financial management, and leadership. Written for beginners and anyone interested in starting their own business, Entrepreneurship 101 offers clear explanations and real-world examples of how successful entrepreneurs have built their companies.',
            'number_of_copies' => '167',
            'number_of_pages' => '410',
            'price' => '20',
            'isbn' => '100000011',
            'cover_image' => 'images/entrepreneurship3.jpeg'
        ]);
        $entrepreneurship3->authors()->attach(Author::where('name', 'Ali')->first());

        $javascriptFrameworks = Book::create([
            'category_id' => Category::where('name', 'Programming')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'Mastering JavaScript Frameworks',
            'description' => 'Mastering JavaScript Frameworks is a comprehensive guide to building modern and scalable web applications using popular JavaScript frameworks, including React, Angular, and Vue. This book covers the essential concepts and techniques for working with these frameworks, including components, routing, state management, and server-side rendering.
            Written for developers and anyone interested in building professional-grade web applications, Mastering JavaScript Frameworks offers clear explanations and real-world examples of how to use each framework to its fullest potential. It also provides guidance on how to choose the right framework for your project, optimize performance, and maintain code quality.',
            'number_of_copies' => '163',
            'number_of_pages' => '267',
            'price' => '26',
            'isbn' => '100000083',
            'cover_image' => 'images/javascript-frameworks.png'
        ]);
        $javascriptFrameworks->authors()->attach(Author::where('name', 'Eng.Mohamed Amr')->first());

        
        $contentManagementSystem = Book::create([
            'category_id' => Category::where('name', 'Programming')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'Building Effective Content Management Systems',
            'description' => 'Building Effective Content Management Systems is a practical guide to designing, building, and deploying content management systems (CMS) for websites and web applications. This book covers the essential concepts and techniques for creating CMS systems, including content modeling, information architecture, CMS selection, and customization. With its practical approach and comprehensive coverage, Building Effective Content Management Systems is an excellent resource for anyone who wants to learn how to build effective CMS systems and manage web content efficiently.',
            'number_of_copies' => '157',
            'number_of_pages' => '310',
            'price' => '16',
            'isbn' => '100000054',
            'cover_image' => 'images/content-management-system.jpg'
        ]);
        $contentManagementSystem->authors()->attach(Author::where('name', 'Eslam')->first());

        $dataPrivacy = Book::create([
            'category_id' => Category::where('name', 'Security')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Protect Your Data: A Practical Guide',
            'description' => 'Protect Your Data is a practical guide to understanding and safeguarding your personal data in the digital age. This book covers the essential concepts and techniques for protecting your data privacy, including privacy laws, data encryption, secure browsing, and password management. With its practical approach and actionable tips, Protecting Your Data Privacy is an essential resource for anyone who wants to protect their personal data and maintain control over their online privacy.',
            'number_of_copies' => '137',
            'number_of_pages' => '251',
            'price' => '21',
            'isbn' => '100000051',
            'cover_image' => 'images/data-privacy.jpg'
        ]);
        $dataPrivacy->authors()->attach(Author::where('name', 'Eslam')->first());

        $network = Book::create([
            'category_id' => Category::where('name', 'Network')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Network Fundamentals: A Beginners Guide',
            'description' => 'Network Fundamentals is a beginners guide to understanding computer networks and the basics of network architecture, protocols, and technologies. This book covers the essential concepts and techniques for building and maintaining computer networks, including network topologies, network hardware, and network protocols.',
            'number_of_copies' => '187',
            'number_of_pages' => '281',
            'price' => '31',
            'isbn' => '100000056',
            'cover_image' => 'images/network.jpeg'
        ]);
        $network->authors()->attach(Author::where('name', 'Eslam')->first());

        $security3 = Book::create([
            'category_id' => Category::where('name', 'Security')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Cyber Security 101: Intro to Cyber Security',
            'description' => 'Cyber Security 101 is an introduction to the fundamental concepts and principles of cyber security. This book covers the essential concepts and techniques for protecting computer systems, networks, and data from cyber threats, including malware, viruses, and hacking.',
            'number_of_copies' => '147',
            'number_of_pages' => '381',
            'price' => '34',
            'isbn' => '100000059',
            'cover_image' => 'images/security3.jpg'
        ]);
        $security3->authors()->attach(Author::where('name', 'Eslam')->first());

        
        $ai2 = Book::create([
            'category_id' => Category::where('name', 'Security')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'Artificial Intelligence Book',
            'description' => 'Artificial Intelligence (AI) is transforming our world and shaping the future of humanity. This book provides a comprehensive introduction to the field of AI, covering the fundamental concepts and techniques used in developing intelligent systems. From machine learning and neural networks to natural language processing and robotics, the book explores the latest advancements in AI and their real-world applications.',
            'number_of_copies' => '163',
            'number_of_pages' => '481',
            'price' => '27',
            'isbn' => '100000082',
            'cover_image' => 'images/ai.jpeg'
        ]);
        $ai2->authors()->attach(Author::where('name', 'Eng.Mostafa Mahfouz')->first());

        $network3 = Book::create([
            'category_id' => Category::where('name', 'Network')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Fiber Optic Technology',
            'description' => 'Fiber optic technology has revolutionized the way we communicate and transmit data over networks. This book provides a practical guide to using fiber with network, covering the basics of fiber optic communication systems, components and technologies. The book explores the advantages of fiber optic networks, including high bandwidth, low signal loss, and immunity to electromagnetic interference.',
            'number_of_copies' => '123',
            'number_of_pages' => '281',
            'price' => '36',
            'isbn' => '100000081',
            'cover_image' => 'images/network3.jpeg'
        ]);
        $network3->authors()->attach(Author::where('name', 'Eslam')->first());

        $dataCenter = Book::create([
            'category_id' => Category::where('name', 'Network')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Intro To Data Center',
            'description' => 'Data centers are the backbone of modern computing, providing the infrastructure that supports the vast amounts of data generated and consumed every day. This book provides a comprehensive overview of data center design, construction, and operations, covering everything from power and cooling systems to networking and security.',
            'number_of_copies' => '153',
            'number_of_pages' => '261',
            'price' => '17',
            'isbn' => '100000088',
            'cover_image' => 'images/data-center.jpeg'
        ]);
        $dataCenter->authors()->attach(Author::where('name', 'Eslam')->first());

        $softwareDevelopment = Book::create([
            'category_id' => Category::where('name', 'Programming')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'Intro To Software Development',
            'description' => 'Software development is a constantly evolving field that requires a combination of technical knowledge, creativity, and problem-solving skills. This book provides a comprehensive guide to software development, covering the entire software development lifecycle from concept to deployment. The book covers topics such as requirements gathering, design, coding, testing, and maintenance, as well as project management and team collaboration.',
            'number_of_copies' => '143',
            'number_of_pages' => '221',
            'price' => '27',
            'isbn' => '100000079',
            'cover_image' => 'images/software-development.jpg'
        ]);
        $softwareDevelopment->authors()->attach(Author::where('name', 'Eng.Mohamed Amr')->first());

        $freelance = Book::create([
            'category_id' => Category::where('name', 'Freelancing')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Market Your Services',
            'description' => 'Freelancing is a rapidly growing industry, providing opportunities for individuals to work on their own terms and build successful careers. This book provides a comprehensive guide to freelancing, covering everything from finding clients to managing finances. The book explores various types of freelance work, such as writing, graphic design, and programming, and offers practical tips on how to build a portfolio and market your services.',
            'number_of_copies' => '243',
            'number_of_pages' => '421',
            'price' => '21',
            'isbn' => '100000077',
            'cover_image' => 'images/work-from-home2.jpg'
        ]);
        $freelance->authors()->attach(Author::where('name', 'Mostafa')->first());

        $mobileDevelopment2 = Book::create([
            'category_id' => Category::where('name', 'Programming')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'AppDev: Your Guide to Mobile App Development',
            'description' => 'AppDev A Practical Guide to Mobile App Development provides a step-by-step approach to building mobile apps for iOS and Android devices. The book covers the entire app development process, from ideation to deployment, and explores various tools and technologies used in the development process. ',
            'number_of_copies' => '283',
            'number_of_pages' => '381',
            'price' => '26',
            'isbn' => '100000076',
            'cover_image' => 'images/mobile-development2.jpg'
        ]);
        $mobileDevelopment2->authors()->attach(Author::where('name', 'Eslam')->first());

        $art = Book::create([
            'category_id' => Category::where('name', 'Art')->first()->id,
            'publisher_id' => Publisher::where('name', 'My Bookstore')->first()->id,
            'title' => 'Sketch 101: A Beginner Guide to Drawing',
            'description' => 'Sketch 101: A Beginner Guide to Drawing Art is a practical guide to the basics of drawing. The book covers fundamental concepts such as line, shape, and perspective, and provides step-by-step instructions on how to draw various subjects, from still life to landscapes to portraits. It also explores different drawing mediums, such as graphite, charcoal, and ink, and offers tips on how to use them effectively.',
            'number_of_copies' => '183',
            'number_of_pages' => '288',
            'price' => '19',
            'isbn' => '100000075',
            'cover_image' => 'images/art.jpg'
        ]);
        $art->authors()->attach(Author::where('name', 'Nour')->first());

        $design2 = Book::create([
            'category_id' => Category::where('name', 'Design')->first()->id,
            'publisher_id' => Publisher::where('name', 'EraaSoft')->first()->id,
            'title' => 'Design Book: Your Guide to Learning Design',
            'description' => 'Design Book is an essential resource for anyone looking to learn the basics of design. The book covers fundamental design principles, such as color theory, typography, and layout, and provides practical tips on how to apply them to various design projects.',
            'number_of_copies' => '166',
            'number_of_pages' => '248',
            'price' => '27',
            'isbn' => '100000074',
            'cover_image' => 'images/design2.jpeg'
        ]);
        $design2->authors()->attach(Author::where('name', 'Nour')->first());
    }
}
