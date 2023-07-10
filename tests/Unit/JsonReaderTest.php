<?php

namespace Tests\Unit;

use App\Helpers\Math;
use App\Services\Reader\Exceptions\BadDataFoundException;
use App\Services\Reader\Exceptions\FileNotFoundException;
use Illuminate\Support\Collection;
use Tests\TestCase;

use App\Services\Reader\Factory\ReaderFactory;
use App\Services\Reader\ReaderService;

/**
 * @group json
 */
class JsonReaderTest extends TestCase
{
    public function test_reader_factory_returns_instance_of_reader_service(): void
    {
        $reader = ReaderFactory::json();
        $this->assertInstanceOf(ReaderService::class, $reader);
    }

    public function test_json_throws_file_not_found_exception(): void
    {
        $this->expectException(FileNotFoundException::class);
        ReaderFactory::json()->read('SOME_FILE_THAT_DOES_NOT_EXIST.txt');
    }

    public function test_json_reader_throws_bad_data_exception(): void
    {
        $this->expectException(BadDataFoundException::class);
        $data = ReaderFactory::json()->read('public/BAD_DATA.txt');
    }

    public function test_json_reader_returns_sample_collection(): void
    {
        $data = ReaderFactory::json()->read('public/affiliates.txt');
        $this->assertInstanceOf(Collection::class, $data);
    }

    public function test_calculated_distance_helper_returns_correct_value(): void
    {
        $distance = Math::distance(52.833502, -8.522366, 53.3340285, -6.2535495);
        $this->assertEquals(100.30195849115599, $distance);
    }

    public function test_json_reader_returns_correct_number_of_rows(): void
    {
        $data = ReaderFactory::json()->read('public/affiliates.txt');
        $this->assertCount(32, $data);
    }
}
