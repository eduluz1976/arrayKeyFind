<?php


use eduluz1976\ArrayUtils\ArrayFinder;

class ArrayKeyFindTest extends \PHPUnit\Framework\TestCase {


    public function test1(){
        $this->assertTrue(true);
    }


    public function test2() {
        
        $arr = [
            'foo'=>'1234',
            'level1' => [
                
                'level2' => [
                    'foo'=>'5678',
                    'level3' => [
                        'item1' => 'a',
                        'item2' => 'b',
                        'item 3' => [
                            'error' => [
                                'msg' => 'Error 1',
                                'code' => 001
                            ]
            
                        ]
                    ],
                    'some' => 'thing'
                ], 
                'foo' => 'bar',
                'another' => [
                    'folder' => [
                        'leaf' => true,
                        'xpto' => 'found',
                        'error' => [
                            'msg' => 'Error 2',
                            'code' => 123
                        ]
                    ]
                ]
            ]

        ];

        $finder = new ArrayFinder();

        $this->assertCount(3, $finder->findByKey('foo', $arr));
        $this->assertCount(1, $finder->findByValue('thing', $arr));
        $this->assertCount(2, $finder->findByKey('error', $arr));



    }



}
