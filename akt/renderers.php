<?php

use tool_customlang\form\import;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/renderer.php');
require_once($CFG->dirroot . '/lib/outputrenderers.php');
require_once($CFG->dirroot . '/course/format/renderer.php');
// import($CFG->dirroot . '/course/format/renderer.php');


// class theme_akt_format_section_renderer_base extends format_section_renderer_base{
//     // abstract protected function start_section_list();
//     protected function start_section_list(){
//         return html_writer::start_tag('ul', ['class' => 'topics']);
//     }

//     /**
//      * Generate the closing container html for a list of sections
//      * @return string HTML to output.
//      */
//     protected function end_section_list(){
//         return html_writer::end_tag('ul');
//     }

//     /**
//      * Generate the title for this section page
//      * @return string the page title
//      */
//     protected function page_title(){
//         return get_string('topicoutline');
//     }
//     public function print_multiple_section_page($course, $sections, $mods, $modnames, $modnamesused)
//     {
//         $modinfo = get_fast_modinfo($course);
//         $course = course_get_format($course)->get_course();

//         $context = context_course::instance($course->id);
//         echo $this->output->heading($this->page_title(), 2, 'accesshide');

//         // Copy activity clipboard..
//         echo $this->course_activity_clipboard($course, 0);
//         echo "hehe <br>";
//         // Now the list of sections..
//         echo $this->start_section_list();
//         $numsections = course_get_format($course)->get_last_section_number();
//         foreach ($modinfo->get_section_info_all() as $section => $thissection) {
//             if ($section == 0) {
//                 // 0-section is displayed a little different then the others
//                 if ($thissection->summary or !empty($modinfo->sections[0]) or $this->page->user_is_editing()) {
//                     echo $this->section_header($thissection, $course, false, 0);
//                     echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                     echo $this->courserenderer->course_section_add_cm_control($course, 0, 0);
//                     echo $this->section_footer();
//                 }
//                 continue;
//             }
//             if ($section > $numsections) {
//                 // activities inside this section are 'orphaned', this section will be printed as 'stealth' below
//                 continue;
//             }
//             // Show the section if the user is permitted to access it, OR if it's not available
//             // but there is some available info text which explains the reason & should display,
//             // OR it is hidden but the course has a setting to display hidden sections as unavilable.
//             $showsection = $thissection->uservisible ||
//                 ($thissection->visible && !$thissection->available && !empty($thissection->availableinfo)) ||
//                 (!$thissection->visible && !$course->hiddensections);
//             if (!$showsection) {
//                 continue;
//             }

//             if (!$this->page->user_is_editing() && $course->coursedisplay == COURSE_DISPLAY_MULTIPAGE) {
//                 // Display section summary only.
//                 echo $this->section_summary($thissection, $course, null);
//             } else {
//                 echo $this->section_header($thissection, $course, false, 0);
//                 if ($thissection->uservisible) {
//                     echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                     echo $this->courserenderer->course_section_add_cm_control($course, $section, 0);
//                 }
//                 echo $this->section_footer();
//             }
//         }

//         if ($this->page->user_is_editing() and has_capability('moodle/course:update', $context)) {
//             // Print stealth sections if present.
//             foreach ($modinfo->get_section_info_all() as $section => $thissection) {
//                 if ($section <= $numsections or empty($modinfo->sections[$section])) {
//                     // this is not stealth section or it is empty
//                     continue;
//                 }
//                 echo $this->stealth_section_header($section);
//                 echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                 echo $this->stealth_section_footer();
//             }

//             echo $this->end_section_list();

//             echo $this->change_number_sections($course, 0);
//         } else {
//             echo $this->end_section_list();
//         }
//     }
// }


// Code To Implement
// class theme_akt_format_section_renderer_base extends format_section_renderer_base
// {
//     public function print_multiple_section_page($course, $sections, $mods, $modnames, $modnamesused)
//     {
//         $modinfo = get_fast_modinfo($course);
//         $course = course_get_format($course)->get_course();

//         $context = context_course::instance($course->id);
//         echo $this->output->heading($this->page_title(), 2, 'accesshide');

//         // Copy activity clipboard..
//         echo $this->course_activity_clipboard($course, 0);


//         global $PAGE;
//         global $CFG;
//         echo "hehe <br>";
//         echo $PAGE->url . "<br>";
//         $checkUrl = explode("?", $PAGE->url)[0];
//         echo $checkUrl . "<br>";
//         echo $CFG->wwwroot . "/course/view.ph<br>";
//         if ($checkUrl == $CFG->wwwroot . "/course/view.php") {
//             echo "Same <br>";
//             echo "<div class='d-flex flex-row'>";
//             // Left
//             echo html_writer::start_tag('ul', ['class' => 'topics col-6']);
//             $numsections = course_get_format($course)->get_last_section_number();
//             foreach ($modinfo->get_section_info_all() as $section => $thissection) {
//                 if ($section == 0) {
//                     // 0-section is displayed a little different then the others
//                     if ($thissection->summary or !empty($modinfo->sections[0]) or $this->page->user_is_editing()) {
//                         echo $this->section_header($thissection, $course, false, 0);
//                         echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                         echo $this->courserenderer->course_section_add_cm_control($course, 0, 0);
//                         echo $this->section_footer();
//                     }
//                     continue;
//                 }
//                 if ($section > $numsections) {
//                     // activities inside this section are 'orphaned', this section will be printed as 'stealth' below
//                     continue;
//                 }
//                 // Show the section if the user is permitted to access it, OR if it's not available
//                 // but there is some available info text which explains the reason & should display,
//                 // OR it is hidden but the course has a setting to display hidden sections as unavilable.
//                 $showsection = $thissection->uservisible ||
//                     ($thissection->visible && !$thissection->available && !empty($thissection->availableinfo)) ||
//                     (!$thissection->visible && !$course->hiddensections);
//                 if (!$showsection) {
//                     continue;
//                 }

//                 if (!$this->page->user_is_editing() && $course->coursedisplay == COURSE_DISPLAY_MULTIPAGE) {
//                     // Display section summary only.
//                     echo $this->section_summary($thissection, $course, null);
//                 } else {
//                     echo $this->section_header($thissection, $course, false, 0);
//                     if ($thissection->uservisible) {
//                         echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                         echo $this->courserenderer->course_section_add_cm_control($course, $section, 0);
//                     }
//                     echo $this->section_footer();
//                 }
//             }

//             if ($this->page->user_is_editing() and has_capability('moodle/course:update', $context)) {
//                 // Print stealth sections if present.
//                 foreach ($modinfo->get_section_info_all() as $section => $thissection) {
//                     if ($section <= $numsections or empty($modinfo->sections[$section])) {
//                         // this is not stealth section or it is empty
//                         continue;
//                     }
//                     echo $this->stealth_section_header($section);
//                     echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                     echo $this->stealth_section_footer();
//                 }

//                 echo $this->end_section_list();

//                 echo $this->change_number_sections($course, 0);
//             } else {
//                 echo $this->end_section_list();
//             }
//             // Left End
//             // Right Start
//             echo html_writer::start_tag('ul', ['class' => 'topics col-6']);
//             $numsections = course_get_format($course)->get_last_section_number();
//             foreach ($modinfo->get_section_info_all() as $section => $thissection) {
//                 if ($section == 0) {
//                     // 0-section is displayed a little different then the others
//                     if ($thissection->summary or !empty($modinfo->sections[0]) or $this->page->user_is_editing()) {
//                         echo $this->section_header($thissection, $course, false, 0);
//                         echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                         echo $this->courserenderer->course_section_add_cm_control($course, 0, 0);
//                         echo $this->section_footer();
//                     }
//                     continue;
//                 }
//                 if ($section > $numsections) {
//                     // activities inside this section are 'orphaned', this section will be printed as 'stealth' below
//                     continue;
//                 }
//                 // Show the section if the user is permitted to access it, OR if it's not available
//                 // but there is some available info text which explains the reason & should display,
//                 // OR it is hidden but the course has a setting to display hidden sections as unavilable.
//                 $showsection = $thissection->uservisible ||
//                     ($thissection->visible && !$thissection->available && !empty($thissection->availableinfo)) ||
//                     (!$thissection->visible && !$course->hiddensections);
//                 if (!$showsection) {
//                     continue;
//                 }

//                 if (!$this->page->user_is_editing() && $course->coursedisplay == COURSE_DISPLAY_MULTIPAGE) {
//                     // Display section summary only.
//                     echo $this->section_summary($thissection, $course, null);
//                 } else {
//                     echo $this->section_header($thissection, $course, false, 0);
//                     if ($thissection->uservisible) {
//                         echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                         echo $this->courserenderer->course_section_add_cm_control($course, $section, 0);
//                     }
//                     echo $this->section_footer();
//                 }
//             }

//             if ($this->page->user_is_editing() and has_capability('moodle/course:update', $context)) {
//                 // Print stealth sections if present.
//                 foreach ($modinfo->get_section_info_all() as $section => $thissection) {
//                     if ($section <= $numsections or empty($modinfo->sections[$section])) {
//                         // this is not stealth section or it is empty
//                         continue;
//                     }
//                     echo $this->stealth_section_header($section);
//                     echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                     echo $this->stealth_section_footer();
//                 }

//                 echo $this->end_section_list();

//                 echo $this->change_number_sections($course, 0);
//             } else {
//                 echo $this->end_section_list();
//             }
//             // Right End
//             echo "</div>";
//         } else {
//             // Now the list of sections..
//             echo $this->start_section_list();
//             $numsections = course_get_format($course)->get_last_section_number();
//             foreach ($modinfo->get_section_info_all() as $section => $thissection) {
//                 if ($section == 0) {
//                     // 0-section is displayed a little different then the others
//                     if ($thissection->summary or !empty($modinfo->sections[0]) or $this->page->user_is_editing()) {
//                         echo $this->section_header($thissection, $course, false, 0);
//                         echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                         echo $this->courserenderer->course_section_add_cm_control($course, 0, 0);
//                         echo $this->section_footer();
//                     }
//                     continue;
//                 }
//                 if ($section > $numsections) {
//                     // activities inside this section are 'orphaned', this section will be printed as 'stealth' below
//                     continue;
//                 }
//                 // Show the section if the user is permitted to access it, OR if it's not available
//                 // but there is some available info text which explains the reason & should display,
//                 // OR it is hidden but the course has a setting to display hidden sections as unavilable.
//                 $showsection = $thissection->uservisible ||
//                     ($thissection->visible && !$thissection->available && !empty($thissection->availableinfo)) ||
//                     (!$thissection->visible && !$course->hiddensections);
//                 if (!$showsection) {
//                     continue;
//                 }

//                 if (!$this->page->user_is_editing() && $course->coursedisplay == COURSE_DISPLAY_MULTIPAGE) {
//                     // Display section summary only.
//                     echo $this->section_summary($thissection, $course, null);
//                 } else {
//                     echo $this->section_header($thissection, $course, false, 0);
//                     if ($thissection->uservisible) {
//                         echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                         echo $this->courserenderer->course_section_add_cm_control($course, $section, 0);
//                     }
//                     echo $this->section_footer();
//                 }
//             }

//             if ($this->page->user_is_editing() and has_capability('moodle/course:update', $context)) {
//                 // Print stealth sections if present.
//                 foreach ($modinfo->get_section_info_all() as $section => $thissection) {
//                     if ($section <= $numsections or empty($modinfo->sections[$section])) {
//                         // this is not stealth section or it is empty
//                         continue;
//                     }
//                     echo $this->stealth_section_header($section);
//                     echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
//                     echo $this->stealth_section_footer();
//                 }

//                 echo $this->end_section_list();

//                 echo $this->change_number_sections($course, 0);
//             } else {
//                 echo $this->end_section_list();
//             }
//         }
//         // Part Two
//     }
// }

class theme_akt_core_renderer extends core_renderer
{

    /**
     * Wrapper for header elements.
     *
     * @return string HTML to display the main header.
     */
    public function full_header()
    {

        if (
            $this->page->include_region_main_settings_in_header_actions() &&
            !$this->page->blocks->is_block_present('settings')
        ) {
            // Only include the region main settings if the page has requested it and it doesn't already have
            // the settings block on it. The region main settings are included in the settings block and
            // duplicating the content causes behat failures.
            $this->page->add_header_action(html_writer::div(
                $this->region_main_settings_menu(),
                'd-print-none',
                ['id' => 'region-main-settings-menu']
            ));
        }
        global $USER;
        global $CFG;
        $header = new stdClass();
        $header->settingsmenu = $this->context_header_settings_menu();
        $header->contextheader = $this->context_header();
        $header->hasnavbar = empty($this->page->layout_options['nonavbar']);
        $header->navbar = $this->navbar();
        $header->pageheadingbutton = $this->page_heading_button();
        $header->courseheader = $this->course_header();
        $header->headeractions = $this->page->get_header_actions();
        $header->hasnavbar = true;
        $header->navbar = null;
        $header->navbar .= "<div>";
        $header->navbar .= "<a href='" . $CFG->wwwroot . "/message/index.php'>";
        // $header->navbar.="Messages ".serialize($PAGE->url);
        $header->navbar .= "Messages";
        $header->navbar .= "</a>";
        $header->navbar .= "<a href='" . $CFG->wwwroot . "/user/profile.php?id=" . $USER->id . "'>";
        $header->navbar .= "Profile";
        $header->navbar .= "</a>";
        $header->navbar .= "<a href='" . $CFG->wwwroot . "/user/preferences.php'>";
        $header->navbar .= "Settings";
        $header->navbar .= "</a>";
        $header->navbar .= "<a href='" . $CFG->wwwroot . "/grade/report/overview/index.php'>";
        $header->navbar .= "Grade";
        $header->navbar .= "</a>";
        $header->navbar .= "</div>";
        return $this->render_from_template('core/full_header', $header);
    }
}

class theme_akt_core_course_renderer extends core_course_renderer
{
    /**
     * Renders HTML to display one course module in a course section
     *
     * This includes link, content, availability, completion info and additional information
     * that module type wants to display (i.e. number of unread forum posts)
     *
     * This function calls:
     * {@link core_course_renderer::course_section_cm_name()}
     * {@link core_course_renderer::course_section_cm_text()}
     * {@link core_course_renderer::course_section_cm_availability()}
     * {@link core_course_renderer::course_section_cm_completion()}
     * {@link course_get_cm_edit_actions()}
     * {@link core_course_renderer::course_section_cm_edit_actions()}
     *
     * @param stdClass $course
     * @param completion_info $completioninfo
     * @param cm_info $mod
     * @param int|null $sectionreturn
     * @param array $displayoptions
     * @return string
     */
    public function course_section_cm($course, &$completioninfo, cm_info $mod, $sectionreturn, $displayoptions = array())
    {
        $output = '';
        // We return empty string (because course module will not be displayed at all)
        // if:
        // 1) The activity is not visible to users
        // and
        // 2) The 'availableinfo' is empty, i.e. the activity was
        //     hidden in a way that leaves no info, such as using the
        //     eye icon.
        if (!$mod->is_visible_on_course_page()) {
            return $output;
        }

        $indentclasses = 'mod-indent';
        if (!empty($mod->indent)) {
            $indentclasses .= ' mod-indent-' . $mod->indent;
            if ($mod->indent > 15) {
                $indentclasses .= ' mod-indent-huge';
            }
        }

        $output .= html_writer::start_tag('div');

        if ($this->page->user_is_editing()) {
            $output .= course_get_cm_move($mod, $sectionreturn);
        }

        $output .= html_writer::start_tag('div', array('class' => 'mod-indent-outer w-100'));

        // This div is used to indent the content.
        $output .= html_writer::div('', $indentclasses);

        // Start a wrapper for the actual content to keep the indentation consistent
        $output .= html_writer::start_tag('div');

        // Display the link to the module (or do nothing if module has no url)
        $cmname = $this->course_section_cm_name($mod, $displayoptions);

        if (!empty($cmname)) {
            // Start the div for the activity title, excluding the edit icons.
            $output .= html_writer::start_tag('div', array('class' => 'activityinstance'));
            $output .= $cmname;


            // Module can put text after the link (e.g. forum unread)
            $output .= $mod->afterlink;

            // Closing the tag which contains everything but edit icons. Content part of the module should not be part of this.
            $output .= html_writer::end_tag('div'); // .activityinstance
        }

        // If there is content but NO link (eg label), then display the
        // content here (BEFORE any icons). In this case cons must be
        // displayed after the content so that it makes more sense visually
        // and for accessibility reasons, e.g. if you have a one-line label
        // it should work similarly (at least in terms of ordering) to an
        // activity.
        $contentpart = $this->course_section_cm_text($mod, $displayoptions);
        $url = $mod->url;
        if (empty($url)) {
            $output .= $contentpart;
        }

        $modicons = '';
        if ($this->page->user_is_editing()) {
            $editactions = course_get_cm_edit_actions($mod, $mod->indent, $sectionreturn);
            $modicons .= ' ' . $this->course_section_cm_edit_actions($editactions, $mod, $displayoptions);
            $modicons .= $mod->afterediticons;
        }

        $modicons .= $this->course_section_cm_completion($course, $completioninfo, $mod, $displayoptions);

        if (!empty($modicons)) {
            $output .= html_writer::div($modicons, 'actions');
        }

        // Show availability info (if module is not available).
        $output .= $this->course_section_cm_availability($mod, $displayoptions);

        // If there is content AND a link, then display the content here
        // (AFTER any icons). Otherwise it was displayed before
        if (!empty($url)) {
            $output .= $contentpart;
        }

        $output .= 'Added on date: ';
        $output .= html_writer::start_tag('strong');
        $output .= date_format_string($mod->added, '%Y-%m');
        $output .= html_writer::end_tag('strong');

        $output .= html_writer::end_tag('div'); // $indentclasses

        // End of indentation div.
        $output .= html_writer::end_tag('div');

        $output .= html_writer::end_tag('div');
        return $output;
    }

    /**
     * Outputs contents for frontpage as configured in $CFG->frontpage or $CFG->frontpageloggedin
     *
     * @return string
     */
    public function frontpage()
    {
        global $CFG, $SITE;

        $output = '';

        if (isloggedin() and !isguestuser() and isset($CFG->frontpageloggedin)) {
            $frontpagelayout = $CFG->frontpageloggedin;
        } else {
            $frontpagelayout = $CFG->frontpage;
        }

        $output .= serialize($frontpagelayout);
        $output .= "<h1>hehe</h1>";

        foreach (explode(',', $frontpagelayout) as $v) {
            $output .= "<span>" . $v . "</span>";
            switch ($v) {
                    // Display the main part of the front page.
                case FRONTPAGENEWS:
                    $output .= "<h1>FRONTPAGENEWS</h1>";
                    if ($SITE->newsitems) {
                        // Print forums only when needed.
                        require_once($CFG->dirroot . '/mod/forum/lib.php');
                        if (($newsforum = forum_get_course_forum($SITE->id, 'news')) &&
                            ($forumcontents = $this->frontpage_news($newsforum))
                        ) {
                            $newsforumcm = get_fast_modinfo($SITE)->instances['forum'][$newsforum->id];
                            $output .= $this->frontpage_part(
                                'skipsitenews',
                                'site-news-forum',
                                $newsforumcm->get_formatted_name(),
                                $forumcontents
                            );
                        }
                    }
                    break;

                case FRONTPAGEENROLLEDCOURSELIST:
                    $output .= "<h1>FRONTPAGEENROLLEDCOURSELIST</h1>";
                    $mycourseshtml = $this->frontpage_my_courses();
                    if (!empty($mycourseshtml)) {
                        $output .= $this->frontpage_part(
                            'skipmycourses',
                            'frontpage-course-list',
                            get_string('mycourses'),
                            $mycourseshtml
                        );
                    }
                    break;

                case FRONTPAGEALLCOURSELIST:
                    $output .= "<h1>FRONTPAGEALLCOURSELIST</h1>";
                    $availablecourseshtml = $this->frontpage_available_courses();
                    $output .= $this->frontpage_part(
                        'skipavailablecourses',
                        'frontpage-available-course-list',
                        get_string('availablecourses'),
                        $availablecourseshtml
                    );
                    break;

                case FRONTPAGECATEGORYNAMES:
                    $output .= "<h1>FRONTPAGECATEGORYNAMES</h1>";
                    $output .= $this->frontpage_part(
                        'skipcategories',
                        'frontpage-category-names',
                        get_string('categories'),
                        $this->frontpage_categories_list()
                    );
                    break;

                case FRONTPAGECATEGORYCOMBO:
                    $output .= "<h1>FRONTPAGECATEGORYCOMBO</h1>";
                    $output .= $this->frontpage_part(
                        'skipcourses',
                        'frontpage-category-combo',
                        get_string('courses'),
                        $this->frontpage_combo_list()
                    );
                    break;

                case FRONTPAGECOURSESEARCH:
                    $output .= "<h1>FRONTPAGECOURSESEARCH</h1>";
                    $output .= $this->box($this->course_search_form(''), 'd-flex justify-content-center');
                    break;
            }
            $output .= '<br />';
        }

        return $output;
    }
}
