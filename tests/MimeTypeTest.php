<?php

declare(strict_types=1);

namespace Chiron\Http\Message\Test;

use Chiron\Http\Message\MimeType;
use PHPUnit\Framework\TestCase;

class MimeTypeTest extends TestCase
{
    public function testDetermineFromExtension(): void
    {
        self::assertNull(MimeType::fromExtension('not-a-real-extension'));
        self::assertSame('application/json', MimeType::fromExtension('json'));
    }

    public function testDetermineFromFilename(): void
    {
        self::assertNull(MimeType::fromFilename('/tmp/file/FILE1234.XXX'));
        self::assertSame('image/jpeg', MimeType::fromFilename('/tmp/file/IMG1234.JPEG'));
    }
}
