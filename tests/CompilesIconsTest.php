<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeTeenyIcons\BladeTeenyIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('tni-360')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M7 8.5V8h.5a.5.5 0 11-.5.5zM11.5 6a.5.5 0 00-.5.5v2a.5.5 0 001 0v-2a.5.5 0 00-.5-.5z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.5a7.5 7.5 0 0112.787-5.32 1.5 1.5 0 011.659 2.484A7.52 7.52 0 0115 7.5a7.5 7.5 0 01-15 0zM13.5 3a.5.5 0 100 1 .5.5 0 000-1zM2 6h1.5l-.9 1.2A.5.5 0 003 8h.5a.5.5 0 010 1H2v1h1.5a1.5 1.5 0 00.449-2.932L4.9 5.8a.5.5 0 00-.4-.8H2v1zm5.5-1A1.5 1.5 0 006 6.5v2A1.5 1.5 0 107.5 7H7v-.5a.5.5 0 01.5-.5H8V5h-.5zM10 6.5a1.5 1.5 0 013 0v2a1.5 1.5 0 01-3 0v-2z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('tni-360', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M7 8.5V8h.5a.5.5 0 11-.5.5zM11.5 6a.5.5 0 00-.5.5v2a.5.5 0 001 0v-2a.5.5 0 00-.5-.5z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.5a7.5 7.5 0 0112.787-5.32 1.5 1.5 0 011.659 2.484A7.52 7.52 0 0115 7.5a7.5 7.5 0 01-15 0zM13.5 3a.5.5 0 100 1 .5.5 0 000-1zM2 6h1.5l-.9 1.2A.5.5 0 003 8h.5a.5.5 0 010 1H2v1h1.5a1.5 1.5 0 00.449-2.932L4.9 5.8a.5.5 0 00-.4-.8H2v1zm5.5-1A1.5 1.5 0 006 6.5v2A1.5 1.5 0 107.5 7H7v-.5a.5.5 0 01.5-.5H8V5h-.5zM10 6.5a1.5 1.5 0 013 0v2a1.5 1.5 0 01-3 0v-2z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('tni-360', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M7 8.5V8h.5a.5.5 0 11-.5.5zM11.5 6a.5.5 0 00-.5.5v2a.5.5 0 001 0v-2a.5.5 0 00-.5-.5z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.5a7.5 7.5 0 0112.787-5.32 1.5 1.5 0 011.659 2.484A7.52 7.52 0 0115 7.5a7.5 7.5 0 01-15 0zM13.5 3a.5.5 0 100 1 .5.5 0 000-1zM2 6h1.5l-.9 1.2A.5.5 0 003 8h.5a.5.5 0 010 1H2v1h1.5a1.5 1.5 0 00.449-2.932L4.9 5.8a.5.5 0 00-.4-.8H2v1zm5.5-1A1.5 1.5 0 006 6.5v2A1.5 1.5 0 107.5 7H7v-.5a.5.5 0 01.5-.5H8V5h-.5zM10 6.5a1.5 1.5 0 013 0v2a1.5 1.5 0 01-3 0v-2z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-teeny-icons.class', 'awesome');

        $result = svg('tni-360')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M7 8.5V8h.5a.5.5 0 11-.5.5zM11.5 6a.5.5 0 00-.5.5v2a.5.5 0 001 0v-2a.5.5 0 00-.5-.5z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.5a7.5 7.5 0 0112.787-5.32 1.5 1.5 0 011.659 2.484A7.52 7.52 0 0115 7.5a7.5 7.5 0 01-15 0zM13.5 3a.5.5 0 100 1 .5.5 0 000-1zM2 6h1.5l-.9 1.2A.5.5 0 003 8h.5a.5.5 0 010 1H2v1h1.5a1.5 1.5 0 00.449-2.932L4.9 5.8a.5.5 0 00-.4-.8H2v1zm5.5-1A1.5 1.5 0 006 6.5v2A1.5 1.5 0 107.5 7H7v-.5a.5.5 0 01.5-.5H8V5h-.5zM10 6.5a1.5 1.5 0 013 0v2a1.5 1.5 0 01-3 0v-2z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-teeny-icons.class', 'awesome');

        $result = svg('tni-360', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M7 8.5V8h.5a.5.5 0 11-.5.5zM11.5 6a.5.5 0 00-.5.5v2a.5.5 0 001 0v-2a.5.5 0 00-.5-.5z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.5a7.5 7.5 0 0112.787-5.32 1.5 1.5 0 011.659 2.484A7.52 7.52 0 0115 7.5a7.5 7.5 0 01-15 0zM13.5 3a.5.5 0 100 1 .5.5 0 000-1zM2 6h1.5l-.9 1.2A.5.5 0 003 8h.5a.5.5 0 010 1H2v1h1.5a1.5 1.5 0 00.449-2.932L4.9 5.8a.5.5 0 00-.4-.8H2v1zm5.5-1A1.5 1.5 0 006 6.5v2A1.5 1.5 0 107.5 7H7v-.5a.5.5 0 01.5-.5H8V5h-.5zM10 6.5a1.5 1.5 0 013 0v2a1.5 1.5 0 01-3 0v-2z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeTeenyIconsServiceProvider::class,
        ];
    }
}
