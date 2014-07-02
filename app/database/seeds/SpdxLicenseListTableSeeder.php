<?php

class SpdxLicenseListTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('spdx_license_list')->truncate();
        
		\DB::table('spdx_license_list')->insert(array (
			0 => 
			array (
				'license_list_pk' => 1,
				'wts_key' => 0,
				'license_identifier' => 'AFL-1.1',
				'license_fullname' => 'Academic Free License v1.1',
				'license_matchname_1' => 'AFL 1.1',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			1 => 
			array (
				'license_list_pk' => 2,
				'wts_key' => 0,
				'license_identifier' => 'AFL-1.2',
				'license_fullname' => 'Academic Free License v1.2',
				'license_matchname_1' => 'AFL 1.2',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			2 => 
			array (
				'license_list_pk' => 3,
				'wts_key' => 0,
				'license_identifier' => 'AFL-2.0',
				'license_fullname' => 'Academic Free License v2.0',
				'license_matchname_1' => 'AFL 2.0',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			3 => 
			array (
				'license_list_pk' => 4,
				'wts_key' => 0,
				'license_identifier' => 'AFL-2.1',
				'license_fullname' => 'Academic Free License v2.1',
				'license_matchname_1' => 'AFL 2.1',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			4 => 
			array (
				'license_list_pk' => 5,
				'wts_key' => 0,
				'license_identifier' => 'AFL-3.0',
				'license_fullname' => 'Academic Free License v3.0',
				'license_matchname_1' => 'AFL 3.0',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			5 => 
			array (
				'license_list_pk' => 6,
				'wts_key' => 0,
				'license_identifier' => 'APL-1.0',
				'license_fullname' => 'Adaptive Public License 1.0',
				'license_matchname_1' => 'Adaptive',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			6 => 
			array (
				'license_list_pk' => 7,
				'wts_key' => 0,
				'license_identifier' => 'Aladdin',
				'license_fullname' => 'Aladdin Free Public License',
				'license_matchname_1' => '',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			7 => 
			array (
				'license_list_pk' => 8,
				'wts_key' => 0,
				'license_identifier' => 'ANTLR-PD',
				'license_fullname' => 'ANTLR Software Rights Notice',
				'license_matchname_1' => '',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			8 => 
			array (
				'license_list_pk' => 9,
				'wts_key' => 0,
				'license_identifier' => 'Apache-1.0',
				'license_fullname' => 'Apache License 1.0',
				'license_matchname_1' => 'Apache',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			9 => 
			array (
				'license_list_pk' => 10,
				'wts_key' => 3,
				'license_identifier' => 'Apache-1.1',
				'license_fullname' => 'Apache License 1.1',
				'license_matchname_1' => 'Apache 1.1',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
			'license_text' => '<h1>Apache Software License</h1><tt><p>Version 1.1</p><p>Copyright (c) 2000 The Apache Software Foundation. All rights reserved.</p><p>Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:</p><p>1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.</p><p>2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.</p><p>3. The end-user documentation included with the redistribution, if any, must include the following acknowledgment:</p><blockquote><p>&quot;This product includes software developed by the Apache Software Foundation (http://www.apache.org/).&quot;</p></blockquote><p>Alternately, this acknowledgment may appear in the software itself, if and wherever such third-party acknowledgments normally appear.</p><p>4. The names &quot;Apache&quot; and &quot;Apache Software Foundation&quot; must not be used to endorse or promote products derived from this software without prior written permission. For written permission, please contact apache@apache.org.</p><p>5. Products derived from this software may not be called &quot;Apache&quot;, nor may &quot;Apache&quot; appear in their name, without prior written permission of the Apache Software Foundation.</p><p>THIS SOFTWARE IS PROVIDED &quot;AS IS&quot; AND ANY EXPRESSED OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE APACHE SOFTWARE FOUNDATION OR ITS CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</p><p /><hr /><p /><p>This software consists of voluntary contributions made by many individuals on behalf of the Apache Software Foundation. For more information on the Apache Software Foundation, please see &lt;http://www.apache.org/&gt;.</p><p>Portions of this software are based upon public domain software originally written at the National Center for Supercomputing Applications, University of Illinois, Urbana-Champaign.</p></tt>',
			),
			10 => 
			array (
				'license_list_pk' => 11,
				'wts_key' => 4,
				'license_identifier' => 'Apache-2.0',
				'license_fullname' => 'Apache License 2.0',
				'license_matchname_1' => 'Apache2.0',
				'license_matchname_2' => 'Apache_v2.0',
				'license_matchname_3' => '',
			'license_text' => '<h3>Apache License, Version 2.0</h3><p>Apache License <br />Version 2.0, January 2004 <br />http://www.apache.org/licenses/ </p><p>TERMS AND CONDITIONS FOR USE, REPRODUCTION, AND DISTRIBUTION </p><p>1. Definitions. </p><p>&quot;License&quot; shall mean the terms and conditions for use, reproduction, and distribution as defined by Sections 1 through 9 of this document. </p><p>&quot;Licensor&quot; shall mean the copyright owner or entity authorized by the copyright owner that is granting the License. </p><p>&quot;Legal Entity&quot; shall mean the union of the acting entity and all other entities that control, are controlled by, or are under common control with that entity. For the purposes of this definition, &quot;control&quot; means (i) the power, direct or indirect, to cause the direction or management of such entity, whether by contract or otherwise, or (ii) ownership of fifty percent (50%) or more of the outstanding shares, or (iii) beneficial ownership of such entity. </p><p>&quot;You&quot; (or &quot;Your&quot;) shall mean an individual or Legal Entity exercising permissions granted by this License. </p><p>&quot;Source&quot; form shall mean the preferred form for making modifications, including but not limited to software source code, documentation source, and configuration files. </p><p>&quot;Object&quot; form shall mean any form resulting from mechanical transformation or translation of a Source form, including but not limited to compiled object code, generated documentation, and conversions to other media types. </p><p>&quot;Work&quot; shall mean the work of authorship, whether in Source or Object form, made available under the License, as indicated by a copyright notice that is included in or attached to the work (an example is provided in the Appendix below). </p><p>&quot;Derivative Works&quot; shall mean any work, whether in Source or Object form, that is based on (or derived from) the Work and for which the editorial revisions, annotations, elaborations, or other modifications represent, as a whole, an original work of authorship. For the purposes of this License, Derivative Works shall not include works that remain separable from, or merely link (or bind by name) to the interfaces of, the Work and Derivative Works thereof. </p><p>&quot;Contribution&quot; shall mean any work of authorship, including the original version of the Work and any modifications or additions to that Work or Derivative Works thereof, that is intentionally submitted to Licensor for inclusion in the Work by the copyright owner or by an individual or Legal Entity authorized to submit on behalf of the copyright owner. For the purposes of this definition, &quot;submitted&quot; means any form of electronic, verbal, or written communication sent to the Licensor or its representatives, including but not limited to communication on electronic mailing lists, source code control systems, and issue tracking systems that are managed by, or on behalf of, the Licensor for the purpose of discussing and improving the Work, but excluding communication that is conspicuously marked or otherwise designated in writing by the copyright owner as &quot;Not a Contribution.&quot; </p><p>&quot;Contributor&quot; shall mean Licensor and any individual or Legal Entity on behalf of whom a Contribution has been received by Licensor and subsequently incorporated within the Work. </p><p>2. Grant of Copyright License. </p><p>Subject to the terms and conditions of this License, each Contributor hereby grants to You a perpetual, worldwide, non-exclusive, no-charge, royalty-free, irrevocable copyright license to reproduce, prepare Derivative Works of, publicly display, publicly perform, sublicense, and distribute the Work and such Derivative Works in Source or Object form. </p><p>3. Grant of Patent License. </p><p>Subject to the terms and conditions of this License, each Contributor hereby grants to You a perpetual, worldwide, non-exclusive, no-charge, royalty-free, irrevocable (except as stated in this section) patent license to make, have made, use, offer to sell, sell, import, and otherwise transfer the Work, where such license applies only to those patent claims licensable by such Contributor that are necessarily infringed by their Contribution(s) alone or by combination of their Contribution(s) with the Work to which such Contribution(s) was submitted. If You institute patent litigation against any entity (including a cross-claim or counterclaim in a lawsuit) alleging that the Work or a Contribution incorporated within the Work constitutes direct or contributory patent infringement, then any patent licenses granted to You under this License for that Work shall terminate as of the date such litigation is filed. </p><p>4. Redistribution. </p><p>You may reproduce and distribute copies of the Work or Derivative Works thereof in any medium, with or without modifications, and in Source or Object form, provided that You meet the following conditions: </p><ol><li>You must give any other recipients of the Work or Derivative Works a copy of this License; and </li><li>You must cause any modified files to carry prominent notices stating that You changed the files; and </li><li>You must retain, in the Source form of any Derivative Works that You distribute, all copyright, patent, trademark, and attribution notices from the Source form of the Work, excluding those notices that do not pertain to any part of the Derivative Works; and </li><li>If the Work includes a &quot;NOTICE&quot; text file as part of its distribution, then any Derivative Works that You distribute must include a readable copy of the attribution notices contained within such NOTICE file, excluding those notices that do not pertain to any part of the Derivative Works, in at least one of the following places: within a NOTICE text file distributed as part of the Derivative Works; within the Source form or documentation, if provided along with the Derivative Works; or, within a display generated by the Derivative Works, if and wherever such third-party notices normally appear. The contents of the NOTICE file are for informational purposes only and do not modify the License. You may add Your own attribution notices within Derivative Works that You distribute, alongside or as an addendum to the NOTICE text from the Work, provided that such additional attribution notices cannot be construed as modifying the License.</li></ol><p>You may add Your own copyright statement to Your modifications and may provide additional or different license terms and conditions for use, reproduction, or distribution of Your modifications, or for any such Derivative Works as a whole, provided Your use, reproduction, and distribution of the Work otherwise complies with the conditions stated in this License. </p><p>5. Submission of Contributions. </p><p>Unless You explicitly state otherwise, any Contribution intentionally submitted for inclusion in the Work by You to the Licensor shall be under the terms and conditions of this License, without any additional terms or conditions. Notwithstanding the above, nothing herein shall supersede or modify the terms of any separate license agreement you may have executed with Licensor regarding such Contributions. </p><p>6. Trademarks. </p><p>This License does not grant permission to use the trade names, trademarks, service marks, or product names of the Licensor, except as required for reasonable and customary use in describing the origin of the Work and reproducing the content of the NOTICE file. </p><p>7. Disclaimer of Warranty. </p><p>Unless required by applicable law or agreed to in writing, Licensor provides the Work (and each Contributor provides its Contributions) on an &quot;AS IS&quot; BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied, including, without limitation, any warranties or conditions of TITLE, NON-INFRINGEMENT, MERCHANTABILITY, or FITNESS FOR A PARTICULAR PURPOSE. You are solely responsible for determining the appropriateness of using or redistributing the Work and assume any risks associated with Your exercise of permissions under this License. </p><p>8. Limitation of Liability. </p><p>In no event and under no legal theory, whether in tort (including negligence), contract, or otherwise, unless required by applicable law (such as deliberate and grossly negligent acts) or agreed to in writing, shall any Contributor be liable to You for damages, including any direct, indirect, special, incidental, or consequential damages of any character arising as a result of this License or out of the use or inability to use the Work (including but not limited to damages for loss of goodwill, work stoppage, computer failure or malfunction, or any and all other commercial damages or losses), even if such Contributor has been advised of the possibility of such damages. </p><p>9. Accepting Warranty or Additional Liability. </p><p>While redistributing the Work or Derivative Works thereof, You may choose to offer, and charge a fee for, acceptance of support, warranty, indemnity, or other liability obligations and/or rights consistent with this License. However, in accepting such obligations, You may act only on Your own behalf and on Your sole responsibility, not on behalf of any other Contributor, and only if You agree to indemnify, defend, and hold each Contributor harmless for any liability incurred by, or claims asserted against, such Contributor by reason of your accepting any such warranty or additional liability. </p><p>END OF TERMS AND CONDITIONS </p><p><strong>APPENDIX: How to apply the Apache License to your work</strong> </p><blockquote><p>To apply the Apache License to your work, attach the following boilerplate notice, with the fields enclosed by brackets &quot;[]&quot; replaced with your own identifying information. (Don\'t include the brackets!) The text should be enclosed in the appropriate comment syntax for the file format. We also recommend that a file or class name and description of purpose be included on the same &quot;printed page&quot; as the copyright notice for easier identification within third-party archives.</p></blockquote>',
			),
			11 => 
			array (
				'license_list_pk' => 12,
				'wts_key' => 0,
				'license_identifier' => 'APSL-1.0',
				'license_fullname' => 'Apple Public Source License 1.0',
				'license_matchname_1' => 'APSL1.0',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			12 => 
			array (
				'license_list_pk' => 13,
				'wts_key' => 0,
				'license_identifier' => 'APSL-1.1',
				'license_fullname' => 'Apple Public Source License 1.1',
				'license_matchname_1' => 'APSL1.1',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			13 => 
			array (
				'license_list_pk' => 14,
				'wts_key' => 0,
				'license_identifier' => 'APSL-1.2',
				'license_fullname' => 'Apple Public Source License 1.2',
				'license_matchname_1' => 'APSL1.2',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '',
			),
			14 => 
			array (
				'license_list_pk' => 15,
				'wts_key' => 5,
				'license_identifier' => 'APSL-2.0',
				'license_fullname' => 'Apple Public Source License 2.0',
				'license_matchname_1' => '',
				'license_matchname_2' => '',
				'license_matchname_3' => '',
				'license_text' => '<PRE><H2>APPLE PUBLIC SOURCE LICENSE</H2>
<B>Version 2.0 - August 6, 2003</B>

Please read this License carefully before downloading this software.
By downloading or using this software, you are agreeing to be bound by
the terms of this License. If you do not or cannot agree to the terms
of this License, please do not download or use the software.

1. General; Definitions. This License applies to any program or other
work which Apple Computer, Inc. ("Apple") makes publicly available and
which contains a notice placed by Apple identifying such program or
work as "Original Code" and stating that it is subject to the terms of
this Apple Public Source License version 2.0 ("License"). As used in
this License:

1.1 "Applicable Patent Rights" mean: (a) in the case where Apple is
the grantor of rights, (i) claims of patents that are now or hereafter
acquired, owned by or assigned to Apple and (ii) that cover subject
matter contained in the Original Code, but only to the extent
necessary to use, reproduce and/or distribute the Original Code
without infringement; and (b) in the case where You are the grantor of
rights, (i) claims of patents that are now or hereafter acquired,
owned by or assigned to You and (ii) that cover subject matter in Your
Modifications, taken alone or in combination with Original Code.

1.2 "Contributor" means any person or entity that creates or
contributes to the creation of Modifications.

1.3 "Covered Code" means the Original Code, Modifications, the
combination of Original Code and any Modifications, and/or any
respective portions thereof.

1.4 "Externally Deploy" means: (a) to sublicense, distribute or
otherwise make Covered Code available, directly or indirectly, to
anyone other than You; and/or (b) to use Covered Code, alone or as
part of a Larger Work, in any way to provide a service, including but
not limited to delivery of content, through electronic communication
with a client other than You.

1.5 "Larger Work" means a work which combines Covered Code or portions
thereof with code not governed by the terms of this License.

1.6 "Modifications" mean any addition to, deletion from, and/or change
to, the substance and/or structure of the Original Code, any previous
Modifications, the combination of Original Code and any previous
Modifications, and/or any respective portions thereof. When code is
released as a series of files, a Modification is: (a) any addition to
or deletion from the contents of a file containing Covered Code;
and/or (b) any new file or other representation of computer program
statements that contains any part of Covered Code.

1.7 "Original Code" means (a) the Source Code of a program or other
work as originally made available by Apple under this License,
including the Source Code of any updates or upgrades to such programs
or works made available by Apple under this License, and that has been
expressly identified by Apple as such in the header file(s) of such
work; and (b) the object code compiled from such Source Code and
originally made available by Apple under this License.

1.8 "Source Code" means the human readable form of a program or other
work that is suitable for making modifications to it, including all
modules it contains, plus any associated interface definition files,
scripts used to control compilation and installation of an executable
(object code).

1.9 "You" or "Your" means an individual or a legal entity exercising
rights under this License. For legal entities, "You" or "Your"
includes any entity which controls, is controlled by, or is under
common control with, You, where "control" means (a) the power, direct
or indirect, to cause the direction or management of such entity,
whether by contract or otherwise, or (b) ownership of fifty percent
(50%) or more of the outstanding shares or beneficial ownership of
such entity.

2. Permitted Uses; Conditions &amp; Restrictions. Subject to the terms
and conditions of this License, Apple hereby grants You, effective on
the date You accept this License and download the Original Code, a
world-wide, royalty-free, non-exclusive license, to the extent of
Apple\'s Applicable Patent Rights and copyrights covering the Original
Code, to do the following:

2.1 Unmodified Code. You may use, reproduce, display, perform,
internally distribute within Your organization, and Externally Deploy
verbatim, unmodified copies of the Original Code, for commercial or
non-commercial purposes, provided that in each instance:

(a) You must retain and reproduce in all copies of Original Code the
copyright and other proprietary notices and disclaimers of Apple as
they appear in the Original Code, and keep intact all notices in the
Original Code that refer to this License; and

(b) You must include a copy of this License with every copy of Source
Code of Covered Code and documentation You distribute or Externally
Deploy, and You may not offer or impose any terms on such Source Code
that alter or restrict this License or the recipients\' rights
hereunder, except as permitted under Section 6.

2.2 Modified Code. You may modify Covered Code and use, reproduce,
display, perform, internally distribute within Your organization, and
Externally Deploy Your Modifications and Covered Code, for commercial
or non-commercial purposes, provided that in each instance You also
meet all of these conditions:

(a) You must satisfy all the conditions of Section 2.1 with respect to
the Source Code of the Covered Code;

(b) You must duplicate, to the extent it does not already exist, the
notice in Exhibit A in each file of the Source Code of all Your
Modifications, and cause the modified files to carry prominent notices
stating that You changed the files and the date of any change; and

(c) If You Externally Deploy Your Modifications, You must make
Source Code of all Your Externally Deployed Modifications either
available to those to whom You have Externally Deployed Your
Modifications, or publicly available. Source Code of Your Externally
Deployed Modifications must be released under the terms set forth in
this License, including the license grants set forth in Section 3
below, for as long as you Externally Deploy the Covered Code or twelve
(12) months from the date of initial External Deployment, whichever is
longer. You should preferably distribute the Source Code of Your
Externally Deployed Modifications electronically (e.g. download from a
web site).

2.3 Distribution of Executable Versions. In addition, if You
Externally Deploy Covered Code (Original Code and/or Modifications) in
object code, executable form only, You must include a prominent
notice, in the code itself as well as in related documentation,
stating that Source Code of the Covered Code is available under the
terms of this License with information on how and where to obtain such
Source Code.

2.4 Third Party Rights. You expressly acknowledge and agree that
although Apple and each Contributor grants the licenses to their
respective portions of the Covered Code set forth herein, no
assurances are provided by Apple or any Contributor that the Covered
Code does not infringe the patent or other intellectual property
rights of any other entity. Apple and each Contributor disclaim any
liability to You for claims brought by any other entity based on
infringement of intellectual property rights or otherwise. As a
condition to exercising the rights and licenses granted hereunder, You
hereby assume sole responsibility to secure any other intellectual
property rights needed, if any. For example, if a third party patent
license is required to allow You to distribute the Covered Code, it is
Your responsibility to acquire that license before distributing the
Covered Code.

3. Your Grants. In consideration of, and as a condition to, the
licenses granted to You under this License, You hereby grant to any
person or entity receiving or distributing Covered Code under this
License a non-exclusive, royalty-free, perpetual, irrevocable license,
under Your Applicable Patent Rights and other intellectual property
rights (other than patent) owned or controlled by You, to use,
reproduce, display, perform, modify, sublicense, distribute and
Externally Deploy Your Modifications of the same scope and extent as
Apple\'s licenses under Sections 2.1 and 2.2 above.

4. Larger Works. You may create a Larger Work by combining Covered
Code with other code not governed by the terms of this License and
distribute the Larger Work as a single product. In each such instance,
You must make sure the requirements of this License are fulfilled for
the Covered Code or any portion thereof.

5. Limitations on Patent License. Except as expressly stated in
Section 2, no other patent rights, express or implied, are granted by
Apple herein. Modifications and/or Larger Works may require additional
patent licenses from Apple which Apple may grant in its sole
discretion.

6. Additional Terms. You may choose to offer, and to charge a fee for,
warranty, support, indemnity or liability obligations and/or other
rights consistent with the scope of the license granted herein
("Additional Terms") to one or more recipients of Covered Code.
However, You may do so only on Your own behalf and as Your sole
responsibility, and not on behalf of Apple or any Contributor. You
must obtain the recipient\'s agreement that any such Additional Terms
are offered by You alone, and You hereby agree to indemnify, defend
and hold Apple and every Contributor harmless for any liability
incurred by or claims asserted against Apple or such Contributor by
reason of any such Additional Terms.

7. Versions of the License. Apple may publish revised and/or new
versions of this License from time to time. Each version will be given
a distinguishing version number. Once Original Code has been published
under a particular version of this License, You may continue to use it
under the terms of that version. You may also choose to use such
Original Code under the terms of any subsequent version of this
License published by Apple. No one other than Apple has the right to
modify the terms applicable to Covered Code created under this
License.

8. NO WARRANTY OR SUPPORT. The Covered Code may contain in whole or in
part pre-release, untested, or not fully tested works. The Covered
Code may contain errors that could cause failures or loss of data, and
may be incomplete or contain inaccuracies. You expressly acknowledge
and agree that use of the Covered Code, or any portion thereof, is at
Your sole and entire risk. THE COVERED CODE IS PROVIDED "AS IS" AND
WITHOUT WARRANTY, UPGRADES OR SUPPORT OF ANY KIND AND APPLE AND
APPLE\'S LICENSOR(S) (COLLECTIVELY REFERRED TO AS "APPLE" FOR THE
PURPOSES OF SECTIONS 8 AND 9) AND ALL CONTRIBUTORS EXPRESSLY DISCLAIM
ALL WARRANTIES AND/OR CONDITIONS, EXPRESS OR IMPLIED, INCLUDING, BUT
NOT LIMITED TO, THE IMPLIED WARRANTIES AND/OR CONDITIONS OF
MERCHANTABILITY, OF SATISFACTORY QUALITY, OF FITNESS FOR A PARTICULAR
PURPOSE, OF ACCURACY, OF QUIET ENJOYMENT, AND NONINFRINGEMENT OF THIRD
PARTY RIGHTS. APPLE AND EACH CONTRIBUTOR DOES NOT WARRANT AGAINST
INTERFERENCE WITH YOUR ENJOYMENT OF THE COVERED CODE, THAT THE
FUNCTIONS CONTAINED IN THE COVERED CODE WILL MEET YOUR REQUIREMENTS,
THAT THE OPERATION OF THE COVERED CODE WILL BE UNINTERRUPTED OR
ERROR-FREE, OR THAT DEFECTS IN THE COVERED CODE WILL BE CORRECTED. NO
ORAL OR WRITTEN INFORMATION OR ADVICE GIVEN BY APPLE, AN APPLE
AUTHORIZED REPRESENTATIVE OR ANY CONTRIBUTOR SHALL CREATE A WARRANTY.
You acknowledge that the Covered Code is not intended for use in the
operation of nuclear facilities, aircraft navigation, communication
systems, or air traffic control machines in which case the failure of
the Covered Code could lead to death, personal injury, or severe
physical or environmental damage.

9. LIMITATION OF LIABILITY. TO THE EXTENT NOT PROHIBITED BY LAW, IN NO
EVENT SHALL APPLE OR ANY CONTRIBUTOR BE LIABLE FOR ANY INCIDENTAL,
SPECIAL, INDIRECT OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR RELATING
TO THIS LICENSE OR YOUR USE OR INABILITY TO USE THE COVERED CODE, OR
ANY PORTION THEREOF, WHETHER UNDER A THEORY OF CONTRACT, WARRANTY,
TORT (INCLUDING NEGLIGENCE), PRODUCTS LIABILITY OR OTHERWISE, EVEN IF
APPLE OR SUCH CONTRIBUTOR HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH
DAMAGES AND NOTWITHSTANDING THE FAILURE OF ESSENTIAL PURPOSE OF ANY
REMEDY. SOME JURISDICTIONS DO NOT ALLOW THE LIMITATION OF LIABILITY OF
INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THIS LIMITATION MAY NOT APPLY
TO YOU. In no event shall Apple\'s total liability to You for all
damages (other than as may be required by applicable law) under this
License exceed the amount of fifty dollars ($50.00).

10. Trademarks. This License does not grant any rights to use the
trademarks or trade names "Apple", "Apple Computer", "Mac", "Mac OS",
"QuickTime", "QuickTime Streaming Server" or any other trademarks,
service marks, logos or trade names belonging to Apple (collectively
"Apple Marks") or to any trademark, service mark, logo or trade name
belonging to any Contributor. You agree not to use any Apple Marks in
or as part of the name of products derived from the Original Code or
to endorse or promote products derived from the Original Code other
than as expressly permitted by and in strict compliance at all times
with Apple\'s third party trademark usage guidelines which are posted
at http://www.apple.com/legal/guidelinesfor3rdparties.html.

11. Ownership. Subject to the licenses granted under this License,
each Contributor retains all rights, title and interest in and to any
Modifications made by such Contributor. Apple retains all rights,
title and interest in and to the Original Code and any Modifications
made by or on behalf of Apple ("Apple Modifications"), and such Apple
Modifications will not be automatically subject to this License. Apple
may, at its sole discretion, choose to license such Apple
Modifications under this License, or on different terms from those
contained in this License or may choose not to license them at all.

12. Termination.

12.1 Termination. This License and the rights granted hereunder will
terminate:

(a) automatically without notice from Apple if You fail to comply with
any term(s) of this License and fail to cure such breach within 30
days of becoming aware of such breach;

(b) immediately in the event of the circumstances described in Section
13.5(b); or

(c) automatically without notice from Apple if You, at any time during
the term of this License, commence an action for patent infringement
against Apple; provided that Apple did not first commence
an action for patent infringement against You in that instance.

12.2 Effect of Termination. Upon termination, You agree to immediately
stop any further use, reproduction, modification, sublicensing and
distribution of the Covered Code. All sublicenses to the Covered Code
which have been properly granted prior to termination shall survive
any termination of this License. Provisions which, by their nature,
should remain in effect beyond the termination of this License shall
survive, including but not limited to Sections 3, 5, 8, 9, 10, 11,
12.2 and 13. No party will be liable to any other for compensation,
indemnity or damages of any sort solely as a result of terminating
this License in accordance with its terms, and termination of this
License will be without prejudice to any other right or remedy of
any party.

13. Miscellaneous.

13.1 Government End Users. The Covered Code is a "commercial item" as
defined in FAR 2.101. Government software and technical data rights in
the Covered Code include only those rights customarily provided to the
public as defined in this License. This customary commercial license
in technical data and software is provided in accordance with FAR
12.211 (Technical Data) and 12.212 (Computer Software) and, for
Department of Defense purchases, DFAR 252.227-7015 (Technical Data --
Commercial Items) and 227.7202-3 (Rights in Commercial Computer
Software or Computer Software Documentation). Accordingly, all U.S.
Government End Users acquire Covered Code with only those rights set
forth herein.

13.2 Relationship of Parties. This License will not be construed as
creating an agency, partnership, joint venture or any other form of
legal association between or among You, Apple or any Contributor, and
You will not represent to the contrary, whether expressly, by
implication, appearance or otherwise.

13.3 Independent Development. Nothing in this License will impair
Apple\'s right to acquire, license, develop, have others develop for
it, market and/or distribute technology or products that perform the
same or similar functions as, or otherwise compete with,
Modifications, Larger Works, technology or products that You may
develop, produce, market or distribute.

13.4 Waiver; Construction. Failure by Apple or any Contributor to
enforce any provision of this License will not be deemed a waiver of
future enforcement of that or any other provision. Any law or
regulation which provides that the language of a contract shall be
construed against the drafter will not apply to this License.

13.5 Severability. (a) If for any reason a court of competent
jurisdiction finds any provision of this License, or portion thereof,
to be unenforceable, that provision of the License will be enforced to
the maximum extent permissible so as to effect the economic benefits
and intent of the parties, and the remainder of this License will
continue in full force and effect. (b) Notwithstanding the foregoing,
if applicable law prohibits or restricts You from fully and/or
specifically complying with Sections 2 and/or 3 or prevents the
enforceability of either of those Sections, this License will
immediately terminate and You must immediately discontinue any use of
the Covered Code and destroy all copies of it that are in your
possession or control.

13.6 Dispute Resolution. Any litigation or other dispute resolution
between You and Apple relating to this License shall take place in the
Northern District of California, and You and Apple hereby consent to
the personal jurisdiction of, and venue in, the state and federal
courts within that District with respect to this License. The
application of the United Nations Convention on Contracts for the
International Sale of Goods is expressly excluded.

13.7 Entire Agreement; Governing Law. This License constitutes the
entire agreement between the parties with respect to the subject
matter hereof. This License shall be governed by the laws of the
United States and the State of California, except that body of
California law concerning conflicts of law.

Where You are located in the province of Quebec, Canada, the following
clause applies: The parties hereby confirm that they have requested
that this License and all related documents be drafted in English. Les
parties ont exige que le present contrat et tous les documents
connexes soient rediges en anglais.

EXHIBIT A.

"Portions Copyright (c) 1999-2003 Apple Computer, Inc. All Rights
Reserved.

This file contains Original Code and/or Modifications of Original Code
as defined in and that are subject to the Apple Public Source License
Version 2.0 (the \'License\'). You may not use this file except in
compliance with the License. Please obtain a copy of the License at
http://www.opensource.apple.com/apsl/ and read it before using this
file.

The Original Code and all software distributed under the License are
distributed on an \'AS IS\' basis, WITHOUT WARRANTY OF ANY KIND, EITHER
EXPRESS OR IMPLIED, AND APPLE HEREBY DISCLAIMS ALL SUCH WARRANTIES,
INCLUDING WITHOUT LIMITATION, ANY WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE, QUIET ENJOYMENT OR NON-INFRINGEMENT.
Please see the License for the specific language governing rights and
limitations under the License."</PRE>',
		),
		15 => 
		array (
			'license_list_pk' => 16,
			'wts_key' => 6,
			'license_identifier' => 'Artistic-1.0',
			'license_fullname' => 'Artistic License 1.0',
			'license_matchname_1' => 'Artistic1.0',
			'license_matchname_2' => '',
			'license_matchname_3' => '',
			'license_text' => '<H1>The Artistic License</H1><TT>
<P>Preamble</P>
<P>The intent of this document is to state the conditions under which a Package may be copied, such that the Copyright Holder maintains some semblance of artistic control over the development of the package, while giving the users of the package the right to use and distribute the Package in a more-or-less customary fashion, plus the right to make reasonable modifications.</P>
<P>Definitions:</P>
<UL>
<LI>"Package" refers to the collection of files distributed by the Copyright Holder, and derivatives of that collection of files created through textual modification. 
<LI>"Standard Version" refers to such a Package if it has not been modified, or has been modified in accordance with the wishes of the Copyright Holder. 
<LI>"Copyright Holder" is whoever is named in the copyright or copyrights for the package. 
<LI>"You" is you, if you\'re thinking about copying or distributing this Package. 
<LI>"Reasonable copying fee" is whatever you can justify on the basis of media cost, duplication charges, time of people involved, and so on. (You will not be required to justify it to the Copyright Holder, but only to the computing community at large as a market that must bear the fee.) 
<LI>"Freely Available" means that no fee is charged for the item itself, though there may be fees involved in handling the item. It also means that recipients of the item may redistribute it under the same conditions they received it. </LI></UL>
<P>1. You may make and give away verbatim copies of the source form of the Standard Version of this Package without restriction, provided that you duplicate all of the original copyright notices and associated disclaimers.</P>
<P>2. You may apply bug fixes, portability fixes and other modifications derived from the Public Domain or from the Copyright Holder. A Package modified in such a way shall still be considered the Standard Version.</P>
<P>3. You may otherwise modify your copy of this Package in any way, provided that you insert a prominent notice in each changed file stating how and when you changed that file, and provided that you do at least ONE of the following:</P>
<BLOCKQUOTE>
<P>a) place your modifications in the Public Domain or otherwise make them Freely Available, such as by posting said modifications to Usenet or an equivalent medium, or placing the modifications on a major archive site such as ftp.uu.net, or by allowing the Copyright Holder to include your modifications in the Standard Version of the Package.</P>
<P>b) use the modified Package only within your corporation or organization.</P>
<P>c) rename any non-standard executables so the names do not conflict with standard executables, which must also be provided, and provide a separate manual page for each non-standard executable that clearly documents how it differs from the Standard Version.</P>
<P>d) make other distribution arrangements with the Copyright Holder.</P></BLOCKQUOTE>
<P>4. You may distribute the programs of this Package in object code or executable form, provided that you do at least ONE of the following:</P>
<BLOCKQUOTE>
<P>a) distribute a Standard Version of the executables and library files, together with instructions (in the manual page or equivalent) on where to get the Standard Version.</P>
<P>b) accompany the distribution with the machine-readable source of the Package with your modifications.</P>
<P>c) accompany any non-standard executables with their corresponding Standard Version executables, giving the non-standard executables non-standard names, and clearly documenting the differences in manual pages (or equivalent), together with instructions on where to get the Standard Version.</P>
<P>d) make other distribution arrangements with the Copyright Holder.</P></BLOCKQUOTE>
<P>5. You may charge a reasonable copying fee for any distribution of this Package. You may charge any fee you choose for support of this Package. You may not charge a fee for this Package itself. However, you may distribute this Package in aggregate with other (possibly commercial) programs as part of a larger (possibly commercial) software distribution provided that you do not advertise this Package as a product of your own.</P>
<P>6. The scripts and library files supplied as input to or produced as output from the programs of this Package do not automatically fall under the copyright of this Package, but belong to whomever generated them, and may be sold commercially, and may be aggregated with this Package.</P>
<P>7. C or perl subroutines supplied by you and linked into this Package shall not be considered part of this Package.</P>
<P>8. The name of the Copyright Holder may not be used to endorse or promote products derived from this software without specific prior written permission.</P>
<P>9. THIS PACKAGE IS PROVIDED "AS IS" AND WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF MERCHANTIBILITY AND FITNESS FOR A PARTICULAR PURPOSE.</P>
<P>The End</P></TT>',
),
16 => 
array (
'license_list_pk' => 17,
'wts_key' => 0,
'license_identifier' => 'Artistic-2.0',
'license_fullname' => 'Artistic License 2.0',
'license_matchname_1' => 'Artistic2.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
17 => 
array (
'license_list_pk' => 18,
'wts_key' => 7,
'license_identifier' => 'AAL',
'license_fullname' => 'Attribution Assurance License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<h2>Attribution Assurance License</h2><pre>-----BEGIN PGP SIGNED MESSAGE-----
Hash: SHA1

Copyright (c) 2002 by AUTHOR
PROFESSIONAL IDENTIFICATION * URL
&quot;PROMOTIONAL SLOGAN FOR AUTHOR\'S PROFESSIONAL PRACTICE&quot;

All Rights Reserved
ATTRIBUTION ASSURANCE LICENSE (adapted from the original BSD license)
Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the conditions below are met.
These conditions require a modest attribution to <author /> (the
&quot;Author&quot;), who hopes that its promotional value may help justify the
thousands of dollars in otherwise billable time invested in writing
this and other freely available, open-source software.

1. Redistributions of source code, in whole or part and with or without
modification (the &quot;Code&quot;), must prominently display this GPG-signed
text in verifiable form.
2. Redistributions of the Code in binary form must be accompanied by
this GPG-signed text in any documentation and, each time the resulting
executable program or a program dependent thereon is launched, a
prominent display (e.g., splash screen or banner text) of the Author\'s
attribution information, which includes:
(a) Name (&quot;AUTHOR&quot;),
(b) Professional identification (&quot;PROFESSIONAL IDENTIFICATION&quot;), and
(c) URL (&quot;URL&quot;).
3. Neither the name nor any trademark of the Author may be used to
endorse or promote products derived from this software without specific
prior written permission.
4. Users are entirely responsible, to the exclusion of the Author and
any other persons, for compliance with (1) regulations set by owners or
administrators of employed equipment, (2) licensing terms of any other
software, and (3) local regulations regarding use, including those
regarding import, export, and use of encryption software.

THIS FREE SOFTWARE IS PROVIDED BY THE AUTHOR &quot;AS IS&quot; AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND
FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO
EVENT SHALL THE AUTHOR OR ANY CONTRIBUTOR BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
EFFECTS OF UNAUTHORIZED OR MALICIOUS NETWORK ACCESS;
PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN
IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

-----BEGIN PGP SIGNATURE-----

PGP SIGNATURE BLOCK, LINE 1
PGP SIGNATURE BLOCK, LINE 2
PGP SIGNATURE BLOCK, CHECKSUM (short line)
-----END PGP SIGNATURE-----
</pre><p>--End of License </p><p>Originally written by Edwin A. Suominen for licensing his PRIVARIA secure networking software (see <a href="http://eepatents.com/privaria/#license">www.privaria.org</a>). The author, who is not an attorney, places this license template into the public domain along with a complete disclaimer of any warranty or responsibility for its content or legal efficacy. You may use or modify the language freely, but entirely at your own risk.</p>',
),
18 => 
array (
'license_list_pk' => 19,
'wts_key' => 0,
'license_identifier' => 'BitTorrent-1.0',
'license_fullname' => 'BitTorrent Open Source License v1.0',
'license_matchname_1' => 'BitTorrent1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
19 => 
array (
'license_list_pk' => 20,
'wts_key' => 0,
'license_identifier' => 'BitTorrent-1.1',
'license_fullname' => 'BitTorrent Open Source License v1.1',
'license_matchname_1' => 'BitTorrent',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
20 => 
array (
'license_list_pk' => 21,
'wts_key' => 0,
'license_identifier' => 'BSL-1.0',
'license_fullname' => 'Boost Software License 1.0',
'license_matchname_1' => 'Boost',
'license_matchname_2' => 'Boost_v1.0',
'license_matchname_3' => '',
'license_text' => '',
),
21 => 
array (
'license_list_pk' => 22,
'wts_key' => 0,
'license_identifier' => 'BSD-2-Clause',
'license_fullname' => 'BSD 2-clause "Simplified" License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
22 => 
array (
'license_list_pk' => 23,
'wts_key' => 0,
'license_identifier' => 'BSD-2-Clause-FreeBSD',
'license_fullname' => 'BSD 2-clause FreeBSD License',
'license_matchname_1' => 'BSD Doc',
'license_matchname_2' => 'BSD-Doc',
'license_matchname_3' => '',
'license_text' => '',
),
23 => 
array (
'license_list_pk' => 24,
'wts_key' => 0,
'license_identifier' => 'BSD-2-Clause-NetBSD',
'license_fullname' => 'BSD 2-clause NetBSD License',
'license_matchname_1' => 'NetBSD',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
24 => 
array (
'license_list_pk' => 25,
'wts_key' => 0,
'license_identifier' => 'BSD-3-Clause',
'license_fullname' => 'BSD 3-clause "New" or "Revised" License',
'license_matchname_1' => 'NewBSD',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
25 => 
array (
'license_list_pk' => 26,
'wts_key' => 0,
'license_identifier' => 'BSD-3-Clause-Clear',
'license_fullname' => 'BSD 3-clause Clear License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
26 => 
array (
'license_list_pk' => 27,
'wts_key' => 0,
'license_identifier' => 'BSD-4-Clause',
'license_fullname' => 'BSD 4-clause "Original" or "Old" License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
27 => 
array (
'license_list_pk' => 28,
'wts_key' => 0,
'license_identifier' => 'BSD-4-Clause-UC',
'license_fullname' => 'BSD-4-Clause (University of California-Specific)',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
28 => 
array (
'license_list_pk' => 29,
'wts_key' => 0,
'license_identifier' => 'CECILL-1.0',
'license_fullname' => 'CeCILL Free Software License Agreement v1.0',
'license_matchname_1' => 'CeCILL1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
29 => 
array (
'license_list_pk' => 30,
'wts_key' => 0,
'license_identifier' => 'CECILL-1.1',
'license_fullname' => 'CeCILL Free Software License Agreement v1.1',
'license_matchname_1' => 'Cecill1.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
30 => 
array (
'license_list_pk' => 31,
'wts_key' => 0,
'license_identifier' => 'CECILL-2.0',
'license_fullname' => 'CeCILL Free Software License Agreement v2.0',
'license_matchname_1' => 'CeCILL2.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
31 => 
array (
'license_list_pk' => 32,
'wts_key' => 0,
'license_identifier' => 'CECILL-B',
'license_fullname' => 'CeCILL-B Free Software License Agreement',
'license_matchname_1' => 'CeCILL-B',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
32 => 
array (
'license_list_pk' => 33,
'wts_key' => 0,
'license_identifier' => 'CECILL-C',
'license_fullname' => 'CeCILL-C Free Software License Agreement',
'license_matchname_1' => 'CeCILL-C',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
33 => 
array (
'license_list_pk' => 34,
'wts_key' => 0,
'license_identifier' => 'ClArtistic',
'license_fullname' => 'Clarified Artistic License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
34 => 
array (
'license_list_pk' => 35,
'wts_key' => 0,
'license_identifier' => 'CNRI-Python',
'license_fullname' => 'CNRI Python License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
35 => 
array (
'license_list_pk' => 36,
'wts_key' => 0,
'license_identifier' => 'CNRI-Python-GPL-Compatible',
'license_fullname' => 'CNRI Python Open Source GPL Compatible License Agreement',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
36 => 
array (
'license_list_pk' => 37,
'wts_key' => 0,
'license_identifier' => 'CPOL-1.02',
'license_fullname' => 'Code Project Open License 1.02',
'license_matchname_1' => 'CPOL1.2',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
37 => 
array (
'license_list_pk' => 38,
'wts_key' => 0,
'license_identifier' => 'CDDL-1.0',
'license_fullname' => 'Common Development and Distribution License 1.0',
'license_matchname_1' => 'CDDL1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
38 => 
array (
'license_list_pk' => 39,
'wts_key' => 0,
'license_identifier' => 'CDDL-1.1',
'license_fullname' => 'Common Development and Distribution License 1.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
39 => 
array (
'license_list_pk' => 40,
'wts_key' => 0,
'license_identifier' => 'CPAL-1.0',
'license_fullname' => 'Common Public Attribution License 1.0 ',
'license_matchname_1' => 'CPAL 1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
40 => 
array (
'license_list_pk' => 41,
'wts_key' => 0,
'license_identifier' => 'CPL-1.0',
'license_fullname' => 'Common Public License 1.0',
'license_matchname_1' => 'CPL1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
41 => 
array (
'license_list_pk' => 42,
'wts_key' => 0,
'license_identifier' => 'CATOSL-1.1',
'license_fullname' => 'Computer Associates Trusted Open Source License 1.1',
'license_matchname_1' => 'CA1.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
42 => 
array (
'license_list_pk' => 43,
'wts_key' => 0,
'license_identifier' => 'Condor-1.1',
'license_fullname' => 'Condor Public License v1.1',
'license_matchname_1' => 'Condor',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
43 => 
array (
'license_list_pk' => 44,
'wts_key' => 0,
'license_identifier' => 'CC-BY-1.0',
'license_fullname' => 'Creative Commons Attribution 1.0',
'license_matchname_1' => 'CCA1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
44 => 
array (
'license_list_pk' => 45,
'wts_key' => 0,
'license_identifier' => 'CC-BY-2.0',
'license_fullname' => 'Creative Commons Attribution 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
45 => 
array (
'license_list_pk' => 46,
'wts_key' => 0,
'license_identifier' => 'CC-BY-2.5',
'license_fullname' => 'Creative Commons Attribution 2.5',
'license_matchname_1' => 'CCA2.5',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
46 => 
array (
'license_list_pk' => 47,
'wts_key' => 0,
'license_identifier' => 'CC-BY-3.0',
'license_fullname' => 'Creative Commons Attribution 3.0',
'license_matchname_1' => 'CCA3.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
47 => 
array (
'license_list_pk' => 48,
'wts_key' => 0,
'license_identifier' => 'CC-BY-ND-1.0',
'license_fullname' => 'Creative Commons Attribution No Derivatives 1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
48 => 
array (
'license_list_pk' => 49,
'wts_key' => 0,
'license_identifier' => 'CC-BY-ND-2.0',
'license_fullname' => 'Creative Commons Attribution No Derivatives 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
49 => 
array (
'license_list_pk' => 50,
'wts_key' => 0,
'license_identifier' => 'CC-BY-ND-2.5',
'license_fullname' => 'Creative Commons Attribution No Derivatives 2.5',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
50 => 
array (
'license_list_pk' => 51,
'wts_key' => 0,
'license_identifier' => 'CC-BY-ND-3.0',
'license_fullname' => 'Creative Commons Attribution No Derivatives 3.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
51 => 
array (
'license_list_pk' => 52,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-1.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial 1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
52 => 
array (
'license_list_pk' => 53,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-2.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
53 => 
array (
'license_list_pk' => 54,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-2.5',
'license_fullname' => 'Creative Commons Attribution Non Commercial 2.5',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
54 => 
array (
'license_list_pk' => 55,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-3.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial 3.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
55 => 
array (
'license_list_pk' => 56,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-ND-1.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial No Derivatives 1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
56 => 
array (
'license_list_pk' => 57,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-ND-2.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial No Derivatives 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
57 => 
array (
'license_list_pk' => 58,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-ND-2.5',
'license_fullname' => 'Creative Commons Attribution Non Commercial No Derivatives 2.5',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
58 => 
array (
'license_list_pk' => 59,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-ND-3.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial No Derivatives 3.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
59 => 
array (
'license_list_pk' => 60,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-SA-1.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial Share Alike 1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
60 => 
array (
'license_list_pk' => 61,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-SA-2.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial Share Alike 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
61 => 
array (
'license_list_pk' => 62,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-SA-2.5',
'license_fullname' => 'Creative Commons Attribution Non Commercial Share Alike 2.5',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
62 => 
array (
'license_list_pk' => 63,
'wts_key' => 0,
'license_identifier' => 'CC-BY-NC-SA-3.0',
'license_fullname' => 'Creative Commons Attribution Non Commercial Share Alike 3.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
63 => 
array (
'license_list_pk' => 64,
'wts_key' => 0,
'license_identifier' => 'CC-BY-SA-1.0',
'license_fullname' => 'Creative Commons Attribution Share Alike 1.0',
'license_matchname_1' => 'CCA-SA1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
64 => 
array (
'license_list_pk' => 65,
'wts_key' => 0,
'license_identifier' => 'CC-BY-SA-2.0',
'license_fullname' => 'Creative Commons Attribution Share Alike 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
65 => 
array (
'license_list_pk' => 66,
'wts_key' => 0,
'license_identifier' => 'CC-BY-SA-2.5',
'license_fullname' => 'Creative Commons Attribution Share Alike 2.5',
'license_matchname_1' => 'CCA-SA2.5',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
66 => 
array (
'license_list_pk' => 67,
'wts_key' => 0,
'license_identifier' => 'CC-BY-SA-3.0',
'license_fullname' => 'Creative Commons Attribution Share Alike 3.0',
'license_matchname_1' => 'CCA-SA3.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
67 => 
array (
'license_list_pk' => 68,
'wts_key' => 0,
'license_identifier' => 'CC0-1.0',
'license_fullname' => 'Creative Commons Zero v1.0 Universal',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
68 => 
array (
'license_list_pk' => 69,
'wts_key' => 0,
'license_identifier' => 'CUA-OPL-1.0',
'license_fullname' => 'CUA Office Public License v1.0',
'license_matchname_1' => 'CUA',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
69 => 
array (
'license_list_pk' => 70,
'wts_key' => 0,
'license_identifier' => 'WTFPL',
'license_fullname' => 'Do What The F*ck You Want To Public License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
70 => 
array (
'license_list_pk' => 71,
'wts_key' => 0,
'license_identifier' => 'EPL-1.0',
'license_fullname' => 'Eclipse Public License 1.0',
'license_matchname_1' => 'Eclipse',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
71 => 
array (
'license_list_pk' => 72,
'wts_key' => 0,
'license_identifier' => 'eCos-2.0',
'license_fullname' => 'eCos license version 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
72 => 
array (
'license_list_pk' => 73,
'wts_key' => 0,
'license_identifier' => 'ECL-1.0',
'license_fullname' => 'Educational Community License v1.0',
'license_matchname_1' => 'ECL1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
73 => 
array (
'license_list_pk' => 74,
'wts_key' => 0,
'license_identifier' => 'ECL-2.0',
'license_fullname' => 'Educational Community License v2.0',
'license_matchname_1' => 'ECL2.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
74 => 
array (
'license_list_pk' => 75,
'wts_key' => 0,
'license_identifier' => 'EFL-1.0',
'license_fullname' => 'Eiffel Forum License v1.0',
'license_matchname_1' => 'Eiffel1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
75 => 
array (
'license_list_pk' => 76,
'wts_key' => 13,
'license_identifier' => 'EFL-2.0',
'license_fullname' => 'Eiffel Forum License v2.0',
'license_matchname_1' => 'Eiffel2.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<h2>Eiffel Forum License, version 2</h2><p>1: Permission is hereby granted to use, copy, modify and/or distribute this package, provided that: </p><ul><li>copyright notices are retained unchanged, </li><li>any distribution of this package, whether modified or not, includes this license text. </li></ul><p>2: Permission is hereby also granted to distribute binary programs which depend on this package. If the binary program depends on a modified version of this package, you are encouraged to publicly release the modified version of this package. </p><p>THIS PACKAGE IS PROVIDED &quot;AS IS&quot; AND WITHOUT WARRANTY. ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE AUTHORS BE LIABLE TO ANY PARTY FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES ARISING IN ANY WAY OUT OF THE USE OF THIS PACKAGE.</p>',
),
76 => 
array (
'license_list_pk' => 77,
'wts_key' => 0,
'license_identifier' => 'Entessa',
'license_fullname' => 'Entessa Public License v1.0',
'license_matchname_1' => 'Entessa1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
77 => 
array (
'license_list_pk' => 78,
'wts_key' => 0,
'license_identifier' => 'ErlPL-1.1',
'license_fullname' => 'Erlang Public License v1.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
78 => 
array (
'license_list_pk' => 79,
'wts_key' => 11,
'license_identifier' => 'EUDatagrid',
'license_fullname' => 'EU DataGrid Software License',
'license_matchname_1' => 'EU-DataGrid',
'license_matchname_2' => 'DataGrid',
'license_matchname_3' => '',
'license_text' => '<H3>EU DataGrid Software License</H3>
<P>Copyright (c) 2001 EU DataGrid. All rights reserved. 
<P>This software includes voluntary contributions made to the EU DataGrid. For more information on the EU DataGrid, please see http://www.eu-datagrid.org/. 
<P>Installation, use, reproduction, display, modification and redistribution of this software, with or without modification, in source and binary forms, are permitted. Any exercise of rights under this license by you or your sub-licensees is subject to the following conditions: 
<P>1. Redistributions of this software, with or without modification, must reproduce the above copyright notice and the above license statement as well as this list of conditions, in the software, the user documentation and any other materials provided with the software. 
<P>2. The user documentation, if any, included with a redistribution, must include the following notice: "This product includes software developed by the EU DataGrid (http://www.eu-datagrid.org/)." 
<P>Alternatively, if that is where third-party acknowledgments normally appear, this acknowledgment must be reproduced in the software itself. 
<P>3. The names "EDG", "EDG Toolkit", and "EU DataGrid Project" may not be used to endorse or promote software, or products derived therefrom, except with prior written permission by hep-project-grid-edg-license@cern.ch. 
<P>4. You are under no obligation to provide anyone with any bug fixes, patches, upgrades or other modifications, enhancements or derivatives of the features,functionality or performance of this software that you may develop. However, if you publish or distribute your modifications, enhancements or derivative works without contemporaneously requiring users to enter into a separate written license agreement, then you are deemed to have granted participants in the EU DataGrid a worldwide, non-exclusive, royalty-free, perpetual license to install, use, reproduce, display, modify, redistribute and sub-license your modifications, enhancements or derivative works, whether in binary or source code form, under the license conditions stated in this list of conditions. 
<P>5. DISCLAIMER 
<P>THIS SOFTWARE IS PROVIDED BY THE EU DATAGRID AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, OF SATISFACTORY QUALITY, AND FITNESS FOR A PARTICULAR PURPOSE OR USE ARE DISCLAIMED. THE EU DATAGRID AND CONTRIBUTORS MAKE NO REPRESENTATION THAT THE SOFTWARE, MODIFICATIONS, ENHANCEMENTS OR DERIVATIVE WORKS THEREOF, WILL NOT INFRINGE ANY PATENT, COPYRIGHT, TRADE SECRET OR OTHER PROPRIETARY RIGHT. 
<P>6. LIMITATION OF LIABILITY 
<P>THE EU DATAGRID AND CONTRIBUTORS SHALL HAVE NO LIABILITY TO LICENSEE OR OTHER PERSONS FOR DIRECT, INDIRECT, SPECIAL, INCIDENTAL, CONSEQUENTIAL, EXEMPLARY, OR PUNITIVE DAMAGES OF ANY CHARACTER INCLUDING, WITHOUT LIMITATION, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES, LOSS OF USE, DATA OR PROFITS, OR BUSINESS INTERRUPTION, HOWEVER CAUSED AND ON ANY THEORY OF CONTRACT, WARRANTY, TORT (INCLUDING NEGLIGENCE), PRODUCT LIABILITY OR OTHERWISE, ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. </P>',
),
79 => 
array (
'license_list_pk' => 80,
'wts_key' => 0,
'license_identifier' => 'EUPL-1.0',
'license_fullname' => 'European Union Public License 1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
80 => 
array (
'license_list_pk' => 81,
'wts_key' => 0,
'license_identifier' => 'EUPL-1.1',
'license_fullname' => 'European Union Public License 1.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
81 => 
array (
'license_list_pk' => 82,
'wts_key' => 15,
'license_identifier' => 'Fair',
'license_fullname' => 'Fair License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H3>Fair License</H3>
<P>
<P>&lt;Copyright Information&gt; 
<P>Usage of the works is permitted provided that this instrument is retained with the works, so that any entity that uses the works is notified of this instrument. 
<P>DISCLAIMER: THE WORKS ARE WITHOUT WARRANTY. 
<P>[2004, Fair License: rhid.com/fair] </P>',
),
82 => 
array (
'license_list_pk' => 83,
'wts_key' => 0,
'license_identifier' => 'Frameworx-1.0',
'license_fullname' => 'Frameworx Open License 1.0',
'license_matchname_1' => 'Frameworx1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
83 => 
array (
'license_list_pk' => 84,
'wts_key' => 0,
'license_identifier' => 'FTL',
'license_fullname' => 'Freetype Project License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
84 => 
array (
'license_list_pk' => 85,
'wts_key' => 0,
'license_identifier' => 'AGPL-1.0',
'license_fullname' => 'GNU Affero General Public License v1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
85 => 
array (
'license_list_pk' => 86,
'wts_key' => 0,
'license_identifier' => 'AGPL-3.0',
'license_fullname' => 'GNU Affero General Public License v3.0',
'license_matchname_1' => 'AGPL 3.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
86 => 
array (
'license_list_pk' => 87,
'wts_key' => 0,
'license_identifier' => 'GFDL-1.1',
'license_fullname' => 'GNU Free Documentation License v1.1',
'license_matchname_1' => 'GFDL',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
87 => 
array (
'license_list_pk' => 88,
'wts_key' => 0,
'license_identifier' => 'GFDL-1.2',
'license_fullname' => 'GNU Free Documentation License v1.2',
'license_matchname_1' => 'GFDL1.2',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
88 => 
array (
'license_list_pk' => 89,
'wts_key' => 0,
'license_identifier' => 'GFDL-1.3',
'license_fullname' => 'GNU Free Documentation License v1.3',
'license_matchname_1' => 'GFDL1.3',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
89 => 
array (
'license_list_pk' => 90,
'wts_key' => 0,
'license_identifier' => 'GPL-1.0',
'license_fullname' => 'GNU General Public License v1.0 only',
'license_matchname_1' => 'GPL1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
90 => 
array (
'license_list_pk' => 91,
'wts_key' => 0,
'license_identifier' => 'GPL-1.0+',
'license_fullname' => 'GNU General Public License v1.0 or later',
'license_matchname_1' => 'GPL_v1+',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
91 => 
array (
'license_list_pk' => 92,
'wts_key' => 0,
'license_identifier' => 'GPL-2.0',
'license_fullname' => 'GNU General Public License v2.0 only',
'license_matchname_1' => 'GPL2.0',
'license_matchname_2' => 'GPL_v2',
'license_matchname_3' => '',
'license_text' => '',
),
92 => 
array (
'license_list_pk' => 93,
'wts_key' => 0,
'license_identifier' => 'GPL-2.0+',
'license_fullname' => 'GNU General Public License v2.0 or later',
'license_matchname_1' => 'GPL_v2+',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
93 => 
array (
'license_list_pk' => 94,
'wts_key' => 0,
'license_identifier' => 'GPL-2.0-with-autoconf-exception',
'license_fullname' => 'GNU General Public License v2.0 w/Autoconf exception',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
94 => 
array (
'license_list_pk' => 95,
'wts_key' => 0,
'license_identifier' => 'GPL-2.0-with-bison-exception',
'license_fullname' => 'GNU General Public License v2.0 w/Bison exception',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
95 => 
array (
'license_list_pk' => 96,
'wts_key' => 0,
'license_identifier' => 'GPL-2.0-with-classpath-exception',
'license_fullname' => 'GNU General Public License v2.0 w/Classpath exception',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
96 => 
array (
'license_list_pk' => 97,
'wts_key' => 0,
'license_identifier' => 'GPL-2.0-with-font-exception',
'license_fullname' => 'GNU General Public License v2.0 w/Font exception',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
97 => 
array (
'license_list_pk' => 98,
'wts_key' => 0,
'license_identifier' => 'GPL-2.0-with-GCC-exception',
'license_fullname' => 'GNU General Public License v2.0 w/GCC Runtime Library exception',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
98 => 
array (
'license_list_pk' => 99,
'wts_key' => 0,
'license_identifier' => 'GPL-3.0',
'license_fullname' => 'GNU General Public License v3.0 only',
'license_matchname_1' => 'GPL3.0',
'license_matchname_2' => 'GPL_v3',
'license_matchname_3' => '',
'license_text' => '',
),
99 => 
array (
'license_list_pk' => 100,
'wts_key' => 0,
'license_identifier' => 'GPL-3.0+',
'license_fullname' => 'GNU General Public License v3.0 or later',
'license_matchname_1' => 'GPL_v3+',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
100 => 
array (
'license_list_pk' => 101,
'wts_key' => 0,
'license_identifier' => 'GPL-3.0-with-autoconf-exception',
'license_fullname' => 'GNU General Public License v3.0 w/Autoconf exception',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
101 => 
array (
'license_list_pk' => 102,
'wts_key' => 0,
'license_identifier' => 'GPL-3.0-with-GCC-exception',
'license_fullname' => 'GNU General Public License v3.0 w/GCC Runtime Library exception',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
102 => 
array (
'license_list_pk' => 103,
'wts_key' => 0,
'license_identifier' => 'LGPL-2.1',
'license_fullname' => 'GNU Lesser General Public License v2.1 only',
'license_matchname_1' => 'LGPL2.1',
'license_matchname_2' => 'LGPL_v2.1',
'license_matchname_3' => '',
'license_text' => '',
),
103 => 
array (
'license_list_pk' => 104,
'wts_key' => 0,
'license_identifier' => 'LGPL-2.1+',
'license_fullname' => 'GNU Lesser General Public License v2.1 or later',
'license_matchname_1' => 'LGPL_v2.1+',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
104 => 
array (
'license_list_pk' => 105,
'wts_key' => 0,
'license_identifier' => 'LGPL-3.0',
'license_fullname' => 'GNU Lesser General Public License v3.0 only',
'license_matchname_1' => 'LGPL3.0',
'license_matchname_2' => 'LGPL_v3',
'license_matchname_3' => '',
'license_text' => '',
),
105 => 
array (
'license_list_pk' => 106,
'wts_key' => 0,
'license_identifier' => 'LGPL-3.0+',
'license_fullname' => 'GNU Lesser General Public License v3.0 or later',
'license_matchname_1' => 'LGPL_v3+',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
106 => 
array (
'license_list_pk' => 107,
'wts_key' => 0,
'license_identifier' => 'LGPL-2.0',
'license_fullname' => 'GNU Library General Public License v2 only',
'license_matchname_1' => 'LGPL_v2',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
107 => 
array (
'license_list_pk' => 108,
'wts_key' => 0,
'license_identifier' => 'LGPL-2.0+',
'license_fullname' => 'GNU Library General Public License v2 or later',
'license_matchname_1' => 'LGPL_v2+',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
108 => 
array (
'license_list_pk' => 109,
'wts_key' => 0,
'license_identifier' => 'gSOAP-1.3b',
'license_fullname' => 'gSOAP Public License v1.3b',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
109 => 
array (
'license_list_pk' => 110,
'wts_key' => 0,
'license_identifier' => 'HPND',
'license_fullname' => 'Historic Permission Notice and Disclaimer',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
110 => 
array (
'license_list_pk' => 111,
'wts_key' => 0,
'license_identifier' => 'IPL-1.0',
'license_fullname' => 'IBM Public License v1.0',
'license_matchname_1' => 'IBM',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
111 => 
array (
'license_list_pk' => 112,
'wts_key' => 0,
'license_identifier' => 'Imlib2',
'license_fullname' => 'Imlib2 License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
112 => 
array (
'license_list_pk' => 113,
'wts_key' => 0,
'license_identifier' => 'IJG',
'license_fullname' => 'Independent JPEG Group License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
113 => 
array (
'license_list_pk' => 114,
'wts_key' => 21,
'license_identifier' => 'Intel',
'license_fullname' => 'Intel Open Source License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1>The Intel Open Source License for CDSA/CSSM Implementation<BR>(BSD License with Export Notice)</H1><TT>
<P>Copyright (c) 1996-2000 Intel Corporation<BR>All rights reserved.<BR>Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met: </P>
<UL>
<LI>Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer. 
<LI>Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution. 
<LI>Neither the name of the Intel Corporation nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission. </LI></UL>
<P>THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE INTEL OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</P>
<P>EXPORT LAWS: THIS LICENSE ADDS NO RESTRICTIONS TO THE EXPORT LAWS OF YOUR JURISDICTION. It is licensee\'s responsibility to comply with any export regulations applicable in licensee\'s jurisdiction. Under CURRENT (May 2000) U.S. export regulations this software is eligible for export from the U.S. and can be downloaded by or otherwise exported or reexported worldwide EXCEPT to U.S. embargoed destinations which include Cuba, Iraq, Libya, North Korea, Iran, Syria, Sudan, Afghanistan and any other country to which the U.S. has embargoed goods and services.</P></TT>',
),
114 => 
array (
'license_list_pk' => 115,
'wts_key' => 0,
'license_identifier' => 'IPA',
'license_fullname' => 'IPA Font License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
115 => 
array (
'license_list_pk' => 116,
'wts_key' => 0,
'license_identifier' => 'ISC',
'license_fullname' => 'ISC License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
116 => 
array (
'license_list_pk' => 117,
'wts_key' => 0,
'license_identifier' => 'JSON',
'license_fullname' => 'JSON License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
117 => 
array (
'license_list_pk' => 118,
'wts_key' => 0,
'license_identifier' => 'LPPL-1.3a',
'license_fullname' => 'LaTeX Project Public License 1.3a',
'license_matchname_1' => 'LaTeX1.3a',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
118 => 
array (
'license_list_pk' => 119,
'wts_key' => 0,
'license_identifier' => 'LPPL-1.0',
'license_fullname' => 'LaTeX Project Public License v1.0',
'license_matchname_1' => 'LaTeX1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
119 => 
array (
'license_list_pk' => 120,
'wts_key' => 0,
'license_identifier' => 'LPPL-1.1',
'license_fullname' => 'LaTeX Project Public License v1.1',
'license_matchname_1' => 'LaTeX1.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
120 => 
array (
'license_list_pk' => 121,
'wts_key' => 0,
'license_identifier' => 'LPPL-1.2',
'license_fullname' => 'LaTeX Project Public License v1.2',
'license_matchname_1' => 'LaTeX1.2',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
121 => 
array (
'license_list_pk' => 122,
'wts_key' => 0,
'license_identifier' => 'LPPL-1.3c',
'license_fullname' => 'LaTeX Project Public License v1.3c',
'license_matchname_1' => 'LaTeX1.3c',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
122 => 
array (
'license_list_pk' => 123,
'wts_key' => 0,
'license_identifier' => 'Libpng',
'license_fullname' => 'libpng License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
123 => 
array (
'license_list_pk' => 124,
'wts_key' => 0,
'license_identifier' => 'LPL-1.02',
'license_fullname' => 'Lucent Public License v1.02',
'license_matchname_1' => 'Lucent1.02',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
124 => 
array (
'license_list_pk' => 125,
'wts_key' => 0,
'license_identifier' => 'LPL-1.0',
'license_fullname' => 'Lucent Public License Version 1.0',
'license_matchname_1' => 'Lucent1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
125 => 
array (
'license_list_pk' => 126,
'wts_key' => 0,
'license_identifier' => 'MS-PL',
'license_fullname' => 'Microsoft Public License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
126 => 
array (
'license_list_pk' => 127,
'wts_key' => 0,
'license_identifier' => 'MS-RL',
'license_fullname' => 'Microsoft Reciprocal License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
127 => 
array (
'license_list_pk' => 128,
'wts_key' => 0,
'license_identifier' => 'MirOS',
'license_fullname' => 'MirOS Licence',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
128 => 
array (
'license_list_pk' => 129,
'wts_key' => 24,
'license_identifier' => 'MIT',
'license_fullname' => 'MIT License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1>The MIT License</H1><TT>
<P>Copyright (c) &lt;year&gt; &lt;copyright holders&gt;</P>
<P>Permission is hereby granted, free of charge, to any person obtaining a copy 
of this software and associated documentation files (the "Software"), to deal in 
the Software without restriction, including without limitation the rights to 
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of 
the Software, and to permit persons to whom the Software is furnished to do so, 
subject to the following conditions:</P>
<P>The above copyright notice and this permission notice shall be included in 
all copies or substantial portions of the Software.</P>
<P>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS 
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR 
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER 
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN 
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
SOFTWARE.</P></TT>',
),
129 => 
array (
'license_list_pk' => 130,
'wts_key' => 26,
'license_identifier' => 'Motosoto',
'license_fullname' => 'Motosoto License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<h2>MOTOSOTO OPEN SOURCE LICENSE - Version 0.9.1</h2><p>This Motosoto Open Source License (the &quot;License&quot;) applies to &quot;Community Portal Server&quot; and related software products as well as any updatesor maintenance releases of that software (&quot;Motosoto Products&quot;) that are distributed by Motosoto.Com B.V. (&quot;Licensor&quot;). Any Motosoto Product licensed pursuant to this License is a &quot;Licensed Product.&quot; Licensed Product, in its entirety, is <strong>protected by Dutch copyright law</strong>. This License identifies the terms under which you may use, copy, distribute or modify Licensed Product and has been submitted to the Open Software Initiative (OSI) for approval.</p><p><b>Preamble</b></p><p>This Preamble is intended to describe, in plain English, the nature and scope of this License. However, this Preamble is not a part of this license. The legal effect of this License is dependent only upon the terms of the License and not this Preamble. This License complies with the Open Source Definition and has been approved by Open Source Initiative. Software distributed under this License may be marked as &quot;OSI Certified Open Source Software.&quot; </p><p>This License provides that:</p><blockquote><p>1. You may use, sell or give away the Licensed Product, alone or as a component of an aggregate software distribution containing programs from several different sources. No royalty or other fee is required.</p><p>2. Both Source Code and executable versions of the Licensed Product, including Modifications made by previous Contributors, are available for your use. (The terms &quot;Licensed Product,&quot; &quot;Modifications,&quot; &quot;Contributors&quot; and &quot;Source Code&quot; are defined in the License.)</p><p>3. You are allowed to make Modifications to the Licensed Product, and you can create Derivative Works from it. (The term &quot;Derivative Works&quot; is defined in the License.)</p><p>4. By accepting the Licensed Product under the provisions of this License, you agree that any Modifications you make to the Licensed Product and then distribute are governed by the provisions of this License. In particular, you must make the Source Code of your Modifications available to others.</p><p>5. You may use the Licensed Product for any purpose, but the Licensor is not providing you any warranty whatsoever, nor is the Licensor accepting any liability in the event that the Licensed Product doesn\'t work properly or causes you any injury or damages.</p><p>6. If you sublicense the Licensed Product or Derivative Works, you may charge fees for warranty or support, or for accepting indemnity or liability obligations to your customers. You cannot charge for the Source Code.</p><p>7. If you assert any patent claims against the Licensor relating to the Licensed Product, or if you breach any terms of the License, your rights to the Licensed Product under this License automatically terminate.</p></blockquote><p>You may use this License to distribute your own Derivative Works, in which case the provisions of this License will apply to your Derivative Works just as they do to the original Licensed Product.</p><p>Alternatively, you may distribute your Derivative Works under any other OSI-approved Open Source license, or under a proprietary license of your choice. If you use any license other than this License, however, you must continue to fulfill the requirements of this License (including the provisions relating to publishing the Source Code) for those portions of your Derivative Works that consist of the Licensed Product, including the files containing Modifications.</p><p>New versions of this License may be published from time to time. You may choose to continue to use the license terms in this version of the License or those from the new version. However, only the Licensor has the right to change the License terms as they apply to the Licensed Product. This License relies on precise definitions for certain terms. Those terms are defined when they are first used, and the definitions are repeated for your convenience in a Glossary at the end of the License. </p><p><strong>License Terms</strong></p><blockquote><p>1. <strong>Grant of License From Licensor.</strong></p><p>Licensor hereby grants you a world-wide, royalty-free, non-exclusive license, subject to third party intellectual property claims, to do the following: </p><blockquote><p>a. Use, reproduce, modify, display, perform, sublicense and distribute Licensed Product or portions thereof (including Modifications as hereinafter defined), in both Source Code or as an executable program. &quot;Source Code&quot; means the preferred form for making modifications to the Licensed Product, including all modules contained therein, plus any associated interface definition files, scripts used to control compilation and installation of an executable program, or a list of differential comparisons against the Source Code of the Licensed Product.</p><p>b. Create Derivative Works (as that term is defined under Dutch copyright law) of Licensed Product by adding to or deleting from the substance or structure of said Licensed Product.</p><p>c. Under claims of patents now or hereafter owned or controlled by Licensor, to make, use, sell, offer for sale, have made, and/or otherwise dispose of Licensed Product or portions thereof, but solely to the extent that any such claim is necessary to enable you to make, use, sell, offer for sale, have made, and/or otherwise dispose of Licensed Product or portions thereof or Derivative Works thereof.</p></blockquote><p>2.<strong> Grant of License to Modifications From Contributor</strong>.</p><p>&quot;Modifications&quot; means any additions to or deletions from the substance or structure of (i) a file containing Licensed Product, or (ii) any new file that contains any part of Licensed Product. <strong>Hereinafter in this License, the term &quot;Licensed Product&quot; shall include all previous Modifications that you receive from any Contributor.</strong> By application of the provisions in Section 4(a) below, each person or entity who created or contributed to the creation of, and distributed, a Modification (a &quot;Contributor&quot;) hereby grants you a world-wide, royalty-free, non-exclusive license, subject to third party intellectual property claims, to do the following:</p><blockquote><p>a. Use, reproduce, modify, display, perform, sublicense and distribute any Modifications created by such Contributor or portions thereof, in both Source Code or as an executable program, either on an unmodified basis or as part of Derivative Works. </p><p>b. Under claims of patents now or hereafter owned or controlled by Contributor, to make, use, sell, offer for sale, have made, and/or otherwise dispose of Modifications or portions thereof, but solely to the extent that any such claim is necessary to enable you to make, use, sell, offer for sale, have made, and/or otherwise dispose of Modifications or portions thereof or Derivative Works thereof.</p></blockquote><p>3. <strong>Exclusions From License Grant.</strong></p><p>Nothing in this License shall be deemed to grant any rights to trademarks, copyrights, patents, trade secrets or any other intellectual property of Licensor or any Contributor except as expressly stated herein. No patent license is granted separate from the Licensed Product, for code that you delete from the Licensed Product, or for combinations of the Licensed Product with other software or hardware. No right is granted to the trademarks of Licensor or any Contributor even if such marks are included in the Licensed Product. Nothing in this License shall be interpreted to prohibit Licensor from licensing under different terms from this License any code that Licensor otherwise would have a right to license. </p><p>4. <strong>Your Obligations Regarding Distribution. </strong></p><blockquote><p>a. <strong>Application of This License to Your Modifications.</strong> As an express condition for your use of the Licensed Product, you hereby agree that any Modifications that you create or to which you contribute, and which you distribute, are governed by the terms of this License including, without limitation, Section 2. Any Modifications that you create or to which you contribute may be distributed only under the terms of this License or a future version of this License released under Section 7. You must include a copy of this License with every copy of the Modifications you distribute. You agree not to offer or impose any terms on any Source Code or executable version of the Licensed Product or Modifications that alter or restrict the applicable version of this License or the recipients\' rights hereunder. However, you may include an additional document offering the additional rights described in Section 4(e).</p><p>b. <strong>Availability of Source Code.</strong> You must make available, under the terms of this License, the Source Code of the Licensed Product and any Modifications that you distribute, either on the same media as you distribute any executable or other form of the Licensed Product, or via a mechanism generally accepted in the software development community for the electronic transfer of data (an &quot;Electronic Distribution Mechanism&quot;). The Source Code for any version of Licensed Product or Modifications that you distribute must remain available for at least twelve (12) months after the date it initially became available, or at least six (6) months after a subsequent version of said Licensed Product or Modifications has been made available. You are responsible for ensuring that the Source Code version remains available even if the Electronic Distribution Mechanism is maintained by a third party.</p><p>c. <strong>Description of Modifications. </strong>You must cause any Modifications that you create or to which you contribute, and which you distribute, to contain a file documenting the additions, changes or deletions you made to create or contribute to those Modifications, and the dates of any such additions, changes or deletions. You must include a prominent statement that the Modifications are derived, directly or indirectly, from the Licensed Product and include the names of the Licensor and any Contributor to the Licensed Product in (i) the Source Code and (ii) in any notice displayed by a version of the Licensed Product you distribute or in related documentation in which you describe the origin or ownership of the Licensed Product. You may not modify or delete any preexisting copyright notices in the Licensed Product.</p><p>d. <strong>Intellectual Property Matters. </strong></p><blockquote><p>i. <strong>Third Party Claims.</strong> If you have knowledge that a license to a third party\'s intellectual property right is required to exercise the rights granted by this License, you must include a text file with the Source Code distribution titled &quot;LEGAL&quot; that describes the claim and the party making the claim in sufficient detail that a recipient will know whom to contact. If you obtain such knowledge after you make any Modifications available as described in Section 4(b), you shall promptly modify the LEGAL file in all copies you make available thereafter and shall take other steps (such as notifying appropriate mailing lists or newsgroups) reasonably calculated to inform those who received the Licensed Product from you that new knowledge has been obtained.</p><p>ii. <strong>Contributor APIs.</strong> If your Modifications include an application programming interface (&quot;API&quot;) and you have knowledge of patent licenses that are reasonably necessary to implement that API, you must also include this information in the LEGAL file.</p><p>iii. <strong>Representations. </strong>You represent that, except as disclosed pursuant to 4(d)(i) above, you believe that any Modifications you distribute are your original creations and that you have sufficient rights to grant the rights conveyed by this License.</p></blockquote><p>e. <strong>Required Notices.</strong> You must duplicate this License in any documentation you provide along with the Source Code of any Modifications you create or to which you contribute, and which you distribute, wherever you describe recipients\' rights relating to Licensed Product. You must duplicate the notice contained in Exhibit A (the &quot;Notice&quot;) in each file of the Source Code of any copy you distribute of the Licensed Product. If you created a Modification, you may add your name as a Contributor to the Notice. If it is not possible to put the Notice in a particular Source Code file due to its structure, then you must include such Notice in a location (such as a relevant directory file) where a user would be likely to look for such a notice. You may choose to offer, and charge a fee for, warranty, support, indemnity or liability obligations to one or more recipients of Licensed Product. However, you may do so only on your own behalf, and not on behalf of the Licensor or any Contributor. You must make it clear that any such warranty, support, indemnity or liability obligation is offered by you alone, and you hereby agree to indemnify the Licensor and every Contributor for any liability incurred by the Licensor or such Contributor as a result of warranty, support, indemnity or liability terms you offer.</p><p>f. <strong>Distribution of Executable Versions</strong>. You may distribute Licensed Product as an executable program under a license of your choice that may contain terms different from this License provided (i) you have satisfied the requirements of Sections 4(a) through 4(e) for that distribution, (ii) you include a conspicuous notice in the executable version, related documentation and collateral materials stating that the Source Code version of the Licensed Product is available under the terms of this License, including a description of how and where you have fulfilled the obligations of Section 4(b), (iii) you retain all existing copyright notices in the Licensed Product, and (iv) you make it clear that any terms that differ from this License are offered by you alone, not by Licensor or any Contributor. You hereby agree to indemnify the Licensor and every Contributor for any liability incurred by Licensor or such Contributor as a result of any terms you offer.</p><p>g. <strong>Distribution of Derivative Works</strong>. You may create Derivative Works (e.g., combinations of some or all of the Licensed Product with other code) and distribute the Derivative Works as products under any other license you select, with the proviso that the requirements of this License are fulfilled for those portions of the Derivative Works that consist of the Licensed Product or any Modifications thereto.</p></blockquote><p>5. <strong>Inability to Comply Due to Statute or Regulation</strong>.</p><p>If it is impossible for you to comply with any of the terms of this License with respect to some or all of the Licensed Product due to statute, judicial order, or regulation, then you must (i) comply with the terms of this License to the maximum extent possible, (ii) cite the statute or regulation that prohibits you from adhering to the License, and (iii) describe the limitations and the code they affect. Such description must be included in the LEGAL file described in Section 4(d), and must be included with all distributions of the Source Code. Except to the extent prohibited by statute or regulation, such description must be sufficiently detailed for a recipient of ordinary skill at computer programming to be able to understand it.</p><p>6. <strong>Application of This License</strong>. </p><p>This License applies to code to which Licensor or Contributor has attached the Notice in Exhibit A, which is incorporated herein by this reference.</p><p>7. <strong>Versions of This License</strong>. </p><blockquote><p>a. <strong>Version</strong>. The Motosoto Open Source License is derived from the Jabber Open Source License. All changes are related to applicable law and the location of court.</p><p>b. <strong>New Versions</strong>. Licensor may publish from time to time revised and/or new versions of the License.</p><p>c. <strong>Effect of New Versions</strong>. Once Licensed Product has been published under a particular version of the License, you may always continue to use it under the terms of that version. You may also choose to use such Licensed Product under the terms of any subsequent version of the License published by Licensor. No one other than Lic ensor has the right to modify the terms applicable to Licensed Product created under this License.</p><p>d. <strong>Derivative Works of this License</strong>. If you create or use a modified version of this License, which you may do only in order to apply it to software that is not already a Licensed Product under this License, you must rename your license so that it is not confusingly similar to this License, and must make it clear that your license contains terms that differ from this License. In so naming your license, you may not use any trademark of Licensor or any Contributor.</p></blockquote><p>8. <strong>Disclaimer of Warranty</strong>.</p><p>LICENSED PRODUCT IS PROVIDED UNDER THIS LICENSE ON AN &quot;AS IS&quot; BASIS, WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, WARRANTIES THAT THE LICENSED PRODUCT IS FREE OF DEFECTS, MERCHANTABLE, FIT FOR A PARTICULAR PURPOSE OR NON-INFRINGING. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE LICENSED PRODUCT IS WITH YOU. SHOULD LICENSED PRODUCT PROVE DEFECTIVE IN ANY RESPECT, YOU (AND NOT THE LICENSOR OR ANY OTHER CONTRIBUTOR) ASSUME THE COST OF ANY NECESSARY SERVICING, REPAIR OR CORRECTION. THIS DISCLAIMER OF WARRANTY CONSTITUTES AN ESSENTIAL PART OF THIS LICENSE. NO USE OF LICENSED PRODUCT IS AUTHORIZED HEREUNDER EXCEPT UNDER THIS DISCLAIMER. </p><p>9. <strong>Termination.</strong> </p><blockquote><p>a. <strong>Automatic Termination Upon Breach</strong>. This license and the rights granted hereunder will terminate automatically if you fail to comply with the terms herein and fail to cure such breach within thirty (30) days of becoming aware of the breach. All sublicenses to the Licensed Product that are properly granted shall survive any termination of this license. Provisions that, by their nature, must remain in effect beyond the termination of this License, shall survive.</p><p>b. <strong>Termination Upon Assertion of Patent Infringement</strong>. If you initiate litigation by asserting a patent infringement claim (excluding declaratory judgment actions) against Licensor or a Contributor (Licensor or Contributor against whom you file such an action is referred to herein as &quot;Respondent&quot;) alleging that Licensed Product directly or indirectly infringes any patent, then any and all rights granted by such Respondent to you under Sections 1 or 2 of this License shall terminate prospectively upon sixty (60) days notice from Respondent (the &quot;Notice Period&quot;) unless within that Notice Period you either agree in writing (i) to pay Respondent a mutually agreeable reasonably royalty for your past or future use of Licensed Product made by such Respondent, or (ii) withdraw your litigation claim with respect to Licensed Product against such Respondent. If within said Notice Period a reasonable royalty and payment arrangement are not mutually agreed upon in writing by the parties or the litigation claim is not withdrawn, the rights granted by Licensor to you under Sections 1 and 2 automatically terminate at the expiration of said Notice Period.</p><p>c. <strong>Reasonable Value of This License</strong>. If you assert a patent infringement claim against Respondent alleging that Licensed Product directly or indirectly infringes any patent where such claim is resolved (such as by license or settlement) prior to the initiation of patent infringement litigation, then the reasonable value of the licenses granted by said Respondent under Sections 1 and 2 shall be taken into account in determining the amount or value of any payment or license.</p><p>d. <strong>No Retroactive Effect of Termination</strong>. In the event of termination under Sections 9(a) or 9(b) above, all end user license agreements (excluding licenses to distributors and reselle rs) that have been validly granted by you or any distributor hereunder prior to termination shall survive termination.</p></blockquote><p>10. <strong>Limitation of Liability</strong>.</p><p>UNDER NO CIRCUMSTANCES AND UNDER NO LEGAL THEORY, WHETHER TORT (INCLUDING NEGLIGENCE), CONTRACT, OR OTHERWISE, SHALL THE LICENSOR, ANY CONTRIBUTOR, OR ANY DISTRIBUTOR OF LICENSED PRODUCT, OR ANY SUPPLIER OF ANY OF SUCH PARTIES, BE LIABLE TO ANY PERSON FOR ANY INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY CHARACTER INCLUDING, WITHOUT LIMITATION, DAMAGES FOR LOSS OF GOODWILL, WORK STOPPAGE, COMPUTER FAILURE OR MALFUNCTION, OR ANY AND ALL OTHER COMMERCIAL DAMAGES OR LOSSES, EVEN IF SUCH PARTY SHALL HAVE BEEN INFORMED OF THE POSSIBILITY OF SUCH DAMAGES. THIS LIMITATION OF LIABILITY SHALL NOT APPLY TO LIABILITY FOR DEATH OR PERSONAL INJURY RESULTING FROM SUCH PARTYÃ•S NEGLIGENCE TO THE EXTENT APPLICABLE LAW PROHIBITS SUCH LIMITATION. SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THIS EXCLUSION AND LIMITATION MAY NOT APPLY TO YOU.</p><p>11. <strong>Responsibility for Claims</strong>. </p><p>As between Licensor and Contributors, each party is responsible for claims and damages arising, directly or indirectly, out of its utilization of rights under this License. You agree to work with Licensor and Contributors to distribute such responsibility on an equitable basis. Nothing herein is intended or shall be deemed to constitute any admission of liability.</p><p>12 .<strong>U.S. Government End Users</strong>.</p><p>The Licensed Product is a &quot;commercial item,&quot; as that term is defined in 48 C.F.R. 2.101 (Oct. 1995), consisting of &quot;commercial computer software&quot; and &quot;commercial computer software documentation,&quot; as such terms are used in 48 C.F.R. 12.212 (Sept. 1995). Consistent with 48 C.F.R. 12.212 and 48 C.F.R. 227.7202-1 through 227.7202-4 (June 1995), all U.S. Government End Users acquire Licensed Product with only those rights set forth herein.</p><p>13. <strong>Miscellaneous</strong>. </p><p>This License represents the complete agreement concerning the subject matter hereof. If any provision of this License is held to be unenforceable, such provision shall be reformed only to the extent necessary to make it enforceable. This License shall be governed by Dutch law provisions. The application of the United Nations Convention on Contracts for the International Sale of Goods is expressly excluded. You and Licensor expressly waive any rights to a jury trial in any litigation concerning Licensed Product or this License. Any law or regulation that provides that the language of a contract shall be construed against the drafter shall not apply to this License.</p><p>14. <strong>Definition of &quot;You&quot; in This License</strong>.</p><p>&quot;You&quot; throughout this License, whether in upper or lower case, means an individual or a legal entity exercising rights under, and complying with all of the terms of, this License or a future version of this License issued under Section 7. For legal entities, &quot;you&quot; includes any entity that controls, is controlled by, or is under common control with you. For purposes of this definition, &quot;control&quot; means (i) the power, direct or indirect, to cause the direction or management of such entity, whether by contract or otherwise, or (ii) ownership of fifty percent (50%) or more of the outstanding shares, or (iii) beneficial ownership of such entity.</p><p>15. <strong>Glossary</strong>.</p><p>All defined terms in this License that are used in more than one Section of this License are repeated here, in alphabetical order, for the convenience of the reader. The Section of this License in which each defined term is first used is shown in parentheses. </p><p><strong>Contributor</strong>: Each person or entity who created or contributed to the creation of, and distributed, a Modification. (See Section 2) </p><p><strong>Derivative Works</strong>: That term as used in this License is defined under Dutch copyright law. (See Section 1(b)) </p><p><strong>License</strong>: This Motosoto Open Source License. (See first paragraph of License) </p><p><strong>Licensed Product</strong>: Any Motosoto Product licensed pursuant to this License. The term </p><p>&quot;Licensed Product&quot; includes all previous Modifications from any Contributor that you receive. (See first paragraph of License and Section 2)</p><p><strong>Licensor</strong>: Motosoto.Com B.V.. (See first paragraph of License)</p><p><strong>Modifications</strong>: Any additions to or deletions from the substance or structure of (i) a file containing Licensed Product, or (ii) any new file that contains any part of Licensed Product. (See Section 2)</p><p><strong>Notice</strong>: The notice contained in Exhibit A. (See Section 4(e))</p><p><strong>Source Code</strong>: The preferred form for making modifications to the Licensed Product, including all modules contained therein, plus any associated interface definition files, scripts used to control compilation and installation of an executable program, or a list of differential comparisons against the Source Code of the Licensed Product.</p></blockquote>',
),
130 => 
array (
'license_list_pk' => 131,
'wts_key' => 0,
'license_identifier' => 'MPL-1.0',
'license_fullname' => 'Mozilla Public License 1.0',
'license_matchname_1' => 'Mozilla1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
131 => 
array (
'license_list_pk' => 132,
'wts_key' => 0,
'license_identifier' => 'MPL-1.1',
'license_fullname' => 'Mozilla Public License 1.1 ',
'license_matchname_1' => 'Mozilla1.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
132 => 
array (
'license_list_pk' => 133,
'wts_key' => 0,
'license_identifier' => 'MPL-2.0',
'license_fullname' => 'Mozilla Public License 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
133 => 
array (
'license_list_pk' => 134,
'wts_key' => 0,
'license_identifier' => 'MPL-2.0-no-copyleft-exception',
'license_fullname' => 'Mozilla Public License 2.0 (no copyleft exception)',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
134 => 
array (
'license_list_pk' => 135,
'wts_key' => 0,
'license_identifier' => 'Multics',
'license_fullname' => 'Multics License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
135 => 
array (
'license_list_pk' => 136,
'wts_key' => 0,
'license_identifier' => 'NASA-1.3',
'license_fullname' => 'NASA Open Source Agreement 1.3',
'license_matchname_1' => 'NASA1.3',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
136 => 
array (
'license_list_pk' => 137,
'wts_key' => 29,
'license_identifier' => 'Naumen',
'license_fullname' => 'Naumen Public License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H2>NAUMEN Public License</H2>
<P>This software is Copyright (c) NAUMEN (tm) and Contributors. All rights reserved. 
<P>Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met: 
<P>1. Redistributions in source code must retain the above copyright notice, this list of conditions, and the following disclaimer. 
<P>2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions, and the following disclaimer in the documentation and/or other materials provided with the distribution. 
<P>3. The name NAUMEN (tm) must not be used to endorse or promote products derived from this software without prior written permission from NAUMEN. 
<P>4. The right to distribute this software or to use it for any purpose does not give you the right to use Servicemarks (sm) or Trademarks (tm) of NAUMEN. 
<P>5. If any files originating from NAUMEN or Contributors are modified, you must cause the modified files to carry prominent notices stating that you changed the files and the date of any change. 
<P>Disclaimer: 
<BLOCKQUOTE>THIS SOFTWARE IS PROVIDED BY NAUMEN "AS IS" AND ANY EXPRESSED OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL NAUMEN OR ITS CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. </BLOCKQUOTE>
<P>This software consists of contributions made by NAUMEN and Contributors. Specific attributions are listed in the accompanying credits file. </P>',
),
137 => 
array (
'license_list_pk' => 138,
'wts_key' => 0,
'license_identifier' => 'NBPL-1.0',
'license_fullname' => 'Net Boolean Public License v1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
138 => 
array (
'license_list_pk' => 139,
'wts_key' => 30,
'license_identifier' => 'NGPL',
'license_fullname' => 'Nethack General Public License',
'license_matchname_1' => 'Nethack',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1 align=center>Nethack General Public License</H1>
<H3 align=center>Copyright (c) 1989 M. Stephenson <BR>(Based on the BISON general public license, copyright 1988 Richard M. Stallman) </H3>Everyone is permitted to copy and distribute verbatim copies of this license, but changing it is not allowed. You can also use this wording to make the terms for other programs. 
<P></P>
<P>The license agreements of most software companies keep you at the mercy of those companies. By contrast, our general public license is intended to give everyone the right to share NetHack. To make sure that you get the rights we want you to have, we need to make restrictions that forbid anyone to deny you these rights or to ask you to surrender the rights. Hence this license agreement.</P>
<P>Specifically, we want to make sure that you have the right to give away copies of NetHack, that you receive source code or else can get it if you want it, that you can change NetHack or use pieces of it in new free programs, and that you know you can do these things.</P>
<P>To make sure that everyone has such rights, we have to forbid you to deprive anyone else of these rights. For example, if you distribute copies of NetHack, you must give the recipients all the rights that you have. You must make sure that they, too, receive or can get the source code. And you must tell them their rights.</P>
<P>Also, for our own protection, we must make certain that everyone finds out that there is no warranty for NetHack. If NetHack is modified by someone else and passed on, we want its recipients to know that what they have is not what we distributed.</P>
<P>Therefore we (Mike Stephenson and other holders of NetHack copyrights) make the following terms which say what you must do to be allowed to distribute or change NetHack.</P>
<H2 align=center>COPYING POLICIES </H2>
<OL>
<LI>You may copy and distribute verbatim copies of NetHack source code as you receive it, in any medium, provided that you keep intact the notices on all files that refer to copyrights, to this License Agreement, and to the absence of any warranty; and give any other recipients of the NetHack program a copy of this License Agreement along with the program. 
<LI>You may modify your copy or copies of NetHack or any portion of it, and copy and distribute such modifications under the terms of Paragraph 1 above (including distributing this License Agreement), provided that you also do the following: 
<P>a) cause the modified files to carry prominent notices stating that you changed the files and the date of any change; and</P>
<P>b) cause the whole of any work that you distribute or publish, that in whole or in part contains or is a derivative of NetHack or any part thereof, to be licensed at no charge to all third parties on terms identical to those contained in this License Agreement (except that you may choose to grant more extensive warranty protection to some or all third parties, at your option)</P>
<P>c) You may charge a distribution fee for the physical act of transferring a copy, and you may at your option offer warranty protection in exchange for a fee.</P>
<LI>You may copy and distribute NetHack (or a portion or derivative of it, under Paragraph 2) in object code or executable form under the terms of Paragraphs 1 and 2 above provided that you also do one of the following: 
<P>a) accompany it with the complete machine-readable source code, which must be distributed under the terms of Paragraphs 1 and 2 above; or,</P>
<P>b) accompany it with full information as to how to obtain the complete machine-readable source code from an appropriate archive site. (This alternative is allowed only for noncommercial distribution.)</P>
<P>For these purposes, complete source code means either the full source distribution as originally released over Usenet or updated copies of the files in this distribution used to create the object code or executable.</P>
<LI>You may not copy, sublicense, distribute or transfer NetHack except as expressly provided under this License Agreement. Any attempt otherwise to copy, sublicense, distribute or transfer NetHack is void and your rights to use the program under this License agreement shall be automatically terminated. However, parties who have received computer software programs from you with this License Agreement will not have their licenses terminated so long as such parties remain in full compliance. </LI></OL>
<P>Stated plainly: You are permitted to modify NetHack, or otherwise use parts of NetHack, provided that you comply with the conditions specified above; in particular, your modified NetHack or program containing parts of NetHack must remain freely available as provided in this License Agreement. In other words, go ahead and share NetHack, but don\'t try to stop anyone else from sharing it farther.</P>',
),
139 => 
array (
'license_list_pk' => 140,
'wts_key' => 0,
'license_identifier' => 'NOSL',
'license_fullname' => 'Netizen Open Source License',
'license_matchname_1' => 'Netizen1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
140 => 
array (
'license_list_pk' => 141,
'wts_key' => 0,
'license_identifier' => 'NPL-1.0',
'license_fullname' => 'Netscape Public License v1.0 ',
'license_matchname_1' => 'Netscape',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
141 => 
array (
'license_list_pk' => 142,
'wts_key' => 0,
'license_identifier' => 'NPL-1.1',
'license_fullname' => 'Netscape Public License v1.1',
'license_matchname_1' => 'Netscape1.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
142 => 
array (
'license_list_pk' => 143,
'wts_key' => 31,
'license_identifier' => 'Nokia',
'license_fullname' => 'Nokia Open Source License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1>Nokia Open Source License (NOKOS License) Version 1.0a</H1><TT>
<P><B>1. DEFINITIONS.</B> 
<P><B>"Affiliates</B>" of a party shall mean an entity <BR>a) which is directly or indirectly controlling such party; <BR>b) which is under the same direct or indirect ownership or control as such party; or <BR>c) which is directly or indirectly owned or controlled by such party. <BR>For these purposes, an entity shall be treated as being controlled by another if that other entity has fifty percent (50%) or more of the votes in such entity, is able to direct its affairs and/or to control the composition of its board of directors or equivalent body. 
<P><B>"Commercial Use"</B> shall mean distribution or otherwise making the Covered Software available to a third party. 
<P><B>"Contributor"</B> shall mean each entity that creates or contributes to the creation of Modifications. 
<P><B>"Contributor Version"</B> shall mean in case of any Contributor the combination of the Original Software, prior Modifications used by a Contributor, and the Modifications made by that particular Contributor&nbsp; and in case of Nokia in addition the Original Software in any form, including the form as Exceutable. 
<P><B>"Covered Software"</B> shall mean the Original Software or Modifications or the combination of the Original Software and Modifications, in each case including portions thereof. 
<P><B>"Electronic Distribution Mechanism"</B> shall mean a mechanism generally accepted in the software development community for the electronic transfer of data. 
<P><B>"Executable"</B> shall mean Covered Software in any form other than Source Code. 
<P><B>"Nokia"</B> shall mean Nokia Corporation and its Affiliates. 
<P><B>"Larger Work"</B> shall mean a work, which combines Covered Software or portions thereof with code not governed by the terms of this License. 
<P><B>"License"</B> shall mean this document. 
<P><B>"Licensable"</B> shall mean having the right to grant, to the maximum extent possible, whether at the time of the initial grant or subsequently acquired, any and all of the rights conveyed herein. 
<P><B>"Modifications"</B> shall mean any addition to or deletion from the substance or structure of either the Original Software or any previous Modifications. When Covered Software is released as a series of files, a Modification is: <BR>a) Any addition to or deletion from the contents of a file containing Original Software or previous Modifications. <BR>b) Any new file that contains any part of the Original Software or previous Modifications. 
<P><B>"Original Software"</B> shall mean the Source Code of computer software code which is described in the Source Code notice required by Exhibit A as Original Software, and which, at the time of its release under this License is not already Covered Software governed by this License. 
<P><B>"Patent Claims"</B> shall mean any patent claim(s), now owned or hereafter acquired, including without limitation, method, process, and apparatus claims, in any patent Licensable by grantor. 
<P><B>"Source Code"</B> shall mean the preferred form of the Covered Software for making modifications to it, including all modules it contains, plus any associated interface definition files, scripts used to control compilation and installation of an Executable, or source code differential comparisons against either the Original Software or another well known, available Covered Software of the Contributor\'s choice. The Source Code can be in a compressed or archival form, provided the appropriate decompression or de-archiving software is widely available for no charge. 
<P><B>"You"</B> (or <B>"Your"</B>) shall mean an individual or a legal entity exercising rights under, and complying with all of the terms of, this License or a future version of this License issued under Section 6.1. For legal entities, "You" includes Affiliates of such entity. 
<P><B>2. SOURCE CODE LICENSE.</B> 
<P><I>2.1 Nokia Grant.</I> <BR>Subject to the terms of this License, Nokia hereby grants You a world-wide, royalty-free, non-exclusive license, subject to third party intellectual property claims, each Contributor hereby grants You a world-wide, royalty-free, non-exclusive license: 
<P>a) under copyrights Licensable by Contributor, to use, reproduce, modify, display, perform, sublicense and distribute the Modifications created by such Contributor (or portions thereof) either on an unmodified basis, with other Modifications, as Covered Software and/or as part of a Larger Work; and 
<P>b) under Patent Claims necessarily infringed by the making, using, or selling of Modifications made by that Contributor either alone and/or in combination with its Contributor Version (or portions of such combination), to make, use, sell, offer for sale, have made, and/or otherwise dispose of: 1) Modifications made by that Contributor (or portions thereof); and 2) the combination of Modifications made by that Contributor with its Contributor Version (or portions of such combination). 
<P>c) The licenses granted in Sections 2.2(a) and 2.2(b) are effective on the date Contributor first makes Commercial Use of the Covered Software. 
<P>d) Notwithstanding Section 2.2(b) above, no patent license is granted: 1) for any code that Contributor has deleted from the Contributor Version; 2) separate from the Contributor Version; 3) for infringements caused by: i) third party modifications of Contributor Version or ii) the combination of Modifications made by that Contributor with other software (except as part of the Contributor Version) or other devices; or 4) under Patent Claims infringed by Covered Software in the absence of Modifications made by that Contributor. 
<P><B>3. DISTRIBUTION OBLIGATIONS.</B> 
<P><I>3.1 Application of License.</I> <BR>The Modifications which You create or to which You contribute are governed by the terms of this License, including without limitation Section 2.2. The Source Code version of Covered Software may be distributed only under the terms of this License or a future version of this License released under Section 6.1, and You must include a copy of this License with every copy of the Source Code You distribute. You may not offer or impose any terms on any Source Code version that alters or restricts the applicable version of this License or the recipients\' rights hereunder. However, You may include an additional document offering the additional rights described in Section 3.5. 
<P><I>3.2 Availability of Source Code.</I> <BR>Any Modification which You create or to which You contribute must be made available in Source Code form under the terms of this License either on the same media as an Executable version or via an accepted Electronic Distribution Mechanism to anyone to whom you made an Executable version available; and if made available via Electronic Distribution Mechanism, must remain available for at least twelve (12) months after the date it initially became available, or at least six (6) months after a subsequent version of that particular Modification has been made available to such recipients. You are responsible for ensuring that the Source Code version remains available even if the Electronic Distribution Mechanism is maintained by a third party. 
<P><I>3.3 Description of Modifications.</I> <BR>You must cause all Covered Software to which You contribute to contain a file documenting the changes You made to create that Covered Software and the date of any change. You must include a prominent statement that the Modification is derived, directly or indirectly, from Original Software provided by Nokia and including the name of Nokia in (a) the Source Code, and (b) in any notice in an Executable version or related documentation in which You describe the origin or ownership of the Covered Software. 
<P><I>3.4&nbsp; Intellectual Property Matters</I> 
<P><I>a) Third Party Claims.</I> <BR>If Contributor has knowledge that a license under a third party\'s intellectual property rights is required to exercise the rights granted by such Contributor under Sections 2.1 or 2.2, Contributor must include a text file with the Source Code distribution titled "LEGAL\'\' which describes the claim and the party making the claim in sufficient detail that a recipient will know whom to contact. If Contributor obtains such knowledge after the Modification is made available as described in Section 3.2, Contributor shall promptly modify the LEGAL file in all copies Contributor makes available thereafter and shall take other steps (such as notifying appropriate mailing lists or newsgroups) reasonably calculated to inform those who received the Covered Software that new knowledge has been obtained. 
<P><I>b) Contributor APIs.</I> <BR>If Contributor\'s Modifications include an application programming interface and Contributor has knowledge of patent licenses which are reasonably necessary to implement that API, Contributor must also include this information in the LEGAL file. 
<P><I>c) Representations.</I> <BR>Contributor represents that, except as disclosed pursuant to Section 3.4(a) above, Contributor believes that Contributor\'s Modifications are Contributor\'s original creation(s) and/or Contributor has sufficient rights to grant the rights conveyed by this License. 
<P><I>3.5 Required Notices.</I> <BR>You must duplicate the notice in Exhibit A in each file of the Source Code. If it is not possible to put such notice in a particular Source Code file due to its structure, then You must include such notice in a location (such as a relevant directory) where a user would be likely to look for such a notice. If You created one or more Modification(s) You may add your name as a Contributor to the notice described in Exhibit A. You must also duplicate this License in any documentation for the Source Code where You describe recipients\' rights or ownership rights relating to Covered Software. You may choose to offer, and to charge a fee for, warranty, support, indemnity or liability obligations to one or more recipients of Covered Software. However, You may do so only on Your own behalf, and not on behalf of Nokia or any Contributor. You must make it absolutely clear that any such warranty, support, indemnity or liability obligation is offered by You alone, and You hereby agree to indemnify Nokia and every Contributor for any liability incurred by Nokia or such Contributor as a result of warranty, support, indemnity or liability terms You offer. 
<P><I>3.6 Distribution of Executable Versions.</I> <BR>You may distribute Covered Software in Executable form only if the requirements of Section 3.1-3.5 have been met for that Covered Software, and if You include a notice stating that the Source Code version of the Covered Software is available under the terms of this License, including a description of how and where You have fulfilled the obligations of Section 3.2. The notice must be conspicuously included in any notice in an Executable version, related documentation or collateral in which You describe recipients\' rights relating to the Covered Software. You may distribute the Executable version of Covered Software or ownership rights under a license of Your choice, which may contain terms different from this License, provided that You are in compliance with the terms of this License and that the license for the Executable version does not attempt to limit or alter the recipient\'s rights in the Source Code version from the rights set forth in this License. If You distribute the Executable version under a different license You must make it absolutely clear that any terms which differ from this License are offered by You alone, not by Nokia or any Contributor. You hereby agree to indemnify Nokia and every Contributor for any liability incurred by Nokia or such Contributor as a result of any such terms You offer. 
<P><I>3.7 Larger Works.</I> <BR>You may create a Larger Work by combining Covered Software with other software not governed by the terms of this License and distribute the Larger Work as a single product. In such a case, You must make sure the requirements of this License are fulfilled for the Covered Software. 
<P><B>4. INABILITY TO COMPLY DUE TO STATUTE OR REGULATION.</B> 
<P>If it is impossible for You to comply with any of the terms of this License with respect to some or all of the Covered Software due to statute, judicial order, or regulation then You must: (a) comply with the terms of this License to the maximum extent possible; and (b) describe the limitations and the code they affect. Such description must be included in the LEGAL file described in Section 3.4 and must be included with all distributions of the Source Code. <BR>Except to the extent prohibited by statute or regulation, such description must be sufficiently detailed for a recipient of ordinary skill to be able to understand it. 
<P><B>5. APPLICATION OF THIS LICENSE.</B> 
<P>This License applies to code to which Nokia has attached the notice in Exhibit A and to related Covered Software. 
<P><B>6. VERSIONS OF THE LICENSE.</B> 
<P><I>6.1 New Versions.</I> <BR>Nokia may publish revised and/or new versions of the License from time to time. Each version will be given a distinguishing version number. 
<P><I>6.2 Effect of New Versions.</I> <BR>Once Covered Software has been published under a particular version of the License, You may always continue to use it under the terms of that version. You may also choose to use such Covered Software under the terms of any subsequent version of the License published by Nokia. No one other than Nokia has the right to modify the terms applicable to Covered Software created under this License. 
<P><B>7. DISCLAIMER OF WARRANTY.</B> 
<P>COVERED SOFTWARE IS PROVIDED UNDER THIS LICENSE ON AN "AS IS\'\' BASIS, WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, WITHOUT LIMITATION, WARRANTIES THAT THE COVERED SOFTWARE IS FREE OF DEFECTS, MERCHANTABLE, FIT FOR A PARTICULAR PURPOSE OR NON-INFRINGING. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE COVERED SOFTWARE IS WITH YOU. SHOULD ANY COVERED SOFTWARE PROVE DEFECTIVE IN ANY RESPECT, YOU (NOT NOKIA, ITS LICENSORS OR AFFILIATES OR ANY OTHER CONTRIBUTOR) ASSUME THE COST OF ANY NECESSARY SERVICING, REPAIR OR CORRECTION. THIS DISCLAIMER OF&nbsp; WARRANTY CONSTITUTES AN ESSENTIAL PART OF THIS LICENSE. NO USE OF ANY COVERED SOFTWARE IS AUTHORIZED HEREUNDER EXCEPT UNDER THIS DISCLAIMER. 
<P><B>8. TERMINATION.</B> 
<P>8.1 This License and the rights granted hereunder will terminate automatically if You fail to comply with terms herein and fail to cure such breach within 30 days of becoming aware of the breach. All sublicenses to the Covered Software which are properly granted shall survive any termination of this License. Provisions which, by their nature, must remain in effect beyond the termination of this License shall survive. 
<P>8.2 If You initiate litigation by asserting a patent infringement claim (excluding declatory judgment actions) against Nokia or a Contributor (Nokia or Contributor against whom You file such action is referred to as "Participant") alleging that: 
<P>a) such Participant\'s Contributor Version directly or indirectly infringes any patent, then any and all rights granted by such Participant to You under Sections 2.1 and/or 2.2 of this License shall, upon 60 days notice from Participant terminate prospectively, unless if within 60 days after receipt of notice You either: (i) agree in writing to pay Participant a mutually agreeable reasonable royalty for Your past and future use of Modifications made by such Participant, or (ii) withdraw Your litigation claim with respect to the Contributor Version against such Participant. If within 60 days of notice, a reasonable royalty and payment arrangement are not mutually agreed upon in writing by the parties or the litigation claim is not withdrawn, the rights granted by Participant to You under Sections 2.1 and/or 2.2 automatically terminate at the expiration of the 60 day notice period specified above. 
<P>b) any software, hardware, or device, other than such Participant\'s Contributor Version, directly or indirectly infringes any patent, then any rights granted to You by such Participant under Sections 2.1(b) and 2.2(b) are revoked effective as of the date You first made, used, sold, distributed, or had made, Modifications made by that Participant. 
<P>8.3 If You assert a patent infringement claim against Participant alleging that such Participant\'s Contributor Version directly or indirectly infringes any patent where such claim is resolved (such as by license or settlement) prior to the initiation of patent infringement litigation, then the reasonable value of the licenses granted by such Participant under Sections 2.1 or 2.2 shall be taken into account in determining the amount or value of any payment or license. <BR>8.4 In the event of termination under Sections 8.1 or 8.2 above, all end user license agreements (excluding distributors and resellers) which have been validly granted by You or any distributor hereunder prior to termination shall survive termination. 
<P><B>9. LIMITATION OF LIABILITY.</B> 
<P>UNDER NO CIRCUMSTANCES AND UNDER NO LEGAL THEORY, WHETHER TORT (INCLUDING NEGLIGENCE), CONTRACT, OR OTHERWISE, SHALL YOU, NOKIA, ANY OTHER CONTRIBUTOR, OR ANY DISTRIBUTOR OF COVERED SOFTWARE, OR ANY SUPPLIER OF ANY OF SUCH PARTIES, BE LIABLE TO ANY PERSON FOR ANY INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY CHARACTER INCLUDING, WITHOUT LIMITATION, DAMAGES FOR LOSS OF GOODWILL, WORK STOPPAGE, COMPUTER FAILURE OR MALFUNCTION, OR ANY AND ALL OTHER COMMERCIAL DAMAGES OR LOSSES, EVEN IF SUCH PARTY SHALL HAVE BEEN INFORMED OF THE POSSIBILITY OF SUCH DAMAGES. THIS LIMITATION OF LIABILITY SHALL NOT APPLY TO LIABILITY FOR DEATH OR PERSONAL INJURY RESULTING FROM SUCH PARTY\'S NEGLIGENCE TO THE EXTENT APPLICABLE LAW PROHIBITS SUCH LIMITATION. SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, BUT MAY ALLOW LIABILITY TO BE LIMITED; IN SUCH CASES, A PARTY\'s, ITS EMPLOYEES, LICENSORS OR AFFILIATES\' LIABILITY SHALL BE LIMITED TO U.S. $50. Nothing contained in this License shall prejudice the statutory rights of any party dealing as a consumer. 
<P><B>10. MISCELLANEOUS.</B> 
<P>This License represents the complete agreement concerning subject matter hereof. All rights in the Covered Software not expressly granted under this License are reserved. Nothing in this License shall grant You any rights to use any of the trademarks of Nokia or any of its Affiliates, even if any of such trademarks are included in any part of Covered Software and/or documentation to it. <BR>This License is governed by the laws of Finland excluding its conflict-of-law provisions. All disputes arising from or relating to this Agreement shall be settled by a single arbitrator appointed by the Central Chamber of Commerce of Finland. The arbitration procedure shall take place in Helsinki, Finland in the English language. If any part of this Agreement is found void and unenforceable, it will not affect the validity of the balance of the Agreement, which shall remain valid and enforceable according to its terms. 
<P><B>11. RESPONSIBILITY FOR CLAIMS.</B> 
<P>As between Nokia and the Contributors, each party is responsible for claims and damages arising, directly or indirectly, out of its utilization of rights under this License and You agree to work with Nokia and Contributors to distribute such responsibility on an equitable basis. Nothing herein is intended or shall be deemed to constitute any admission of liability. <BR>&nbsp; 
<P><B>EXHIBIT A</B> 
<P>The contents of this file are subject to the NOKOS License Version 1.0 (the "License"); you may not use this file except in compliance with the License. 
<P>Software distributed under the License is distributed on an "AS IS" basis, WITHOUT WARRANTY OF&nbsp; ANY KIND, either express or implied. See the License for the specific language governing rights and limitations under the License. 
<P>The Original Software is <BR>______________________________________. 
<P><B>Copyright (c) &lt;year&gt; Nokia and others. All Rights Reserved.</B> 
<P>Contributor(s): ______________________________________. </P></TT>',
),
143 => 
array (
'license_list_pk' => 144,
'wts_key' => 0,
'license_identifier' => 'NPOSL-3.0',
'license_fullname' => 'Non-Profit Open Software License 3.0',
'license_matchname_1' => 'Non-profit!',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
144 => 
array (
'license_list_pk' => 145,
'wts_key' => 0,
'license_identifier' => 'NTP',
'license_fullname' => 'NTP License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
145 => 
array (
'license_list_pk' => 146,
'wts_key' => 32,
'license_identifier' => 'OCLC-2.0',
'license_fullname' => 'OCLC Research Public License 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1>OCLC Research Public License 2.0 License</H1>
<CENTER><B>OCLC Research Public License 2.0<BR>Terms &amp; Conditions Of Use<BR>May, 2002<BR>Copyright (c)2002. OCLC Research. All Rights Reserved</B> </CENTER>
<P>PLEASE READ THIS DOCUMENT CAREFULLY. BY DOWNLOADING OR USING THE CODE BASE AND/OR DOCUMENTATION ACCOMPANYING THIS LICENSE (THE "License"), YOU AGREE TO THE FOLLOWING TERMS AND CONDITIONS OF THIS LICENSE. 
<P><B>Section 1. Your Rights</B> 
<P>Subject to these terms and conditions of this License, the OCLC Office of Research (the "Original Contributor") and each subsequent contributor (collectively with the Original Contributor, the "Contributors") hereby grant you a non-exclusive, worldwide, no-charge, transferable license to execute, prepare derivative works of, and distribute (internally and externally), for commercial and noncommercial purposes, the original code contributed by Original Contributor and all Modifications (collectively called the "Program"). 
<P><B>Section 2. Definitions</B> 
<P>A "Modification" to the Program is any addition to or deletion from the contents of any file of the Program and any new file that contains any part of the Program. If you make a Modification and distribute the Program externally you are a "Contributor." The distribution of the Program must be under the terms of this license including those in Section 3 below. 
<P>A "Combined Work" results from combining and integrating all or parts of the Program with other code. A Combined Work may be thought of as having multiple parents or being result of multiple lines of code development. 
<P><B>Section 3. Distribution Licensing Terms</B> 
<P><I>A. General Requirements</I> 
<P>Except as necessary to recognize third-party rights or third-party restriction (see below), a distribution of the Program in any of the forms listed below must not put any further restrictions on the recipient\'s exercise of the rights granted herein. 
<P>As a Contributor, you represent that your Modification(s) are your original creation(s) and, to the best of your knowledge, no third party has any claim (including but not limited to intellectual property claims) relating to your Modification(s). You represent that each of your Modifications includes complete details of any third-party right or other third-party restriction associated with any part of your Modification (including a copy of any applicable license agreement). 
<P>The Program must be distributed without charge beyond the costs of physically transferring the files to the recipient. 
<P>This Warranty Disclaimer/Limitation of Liability must be prominently displayed with every distribution of the Program in any form: 
<P>YOU AGREE THAT THE PROGRAM IS PROVIDED AS-IS, WITHOUT WARRANTY OF ANY KIND (EITHER EXPRESS OR IMPLIED). ACCORDINGLY, OCLC MAKES NO WARRANTIES, REPRESENTATIONS OR GUARANTEES, EITHER EXPRESS OR IMPLIED, AND DISCLAIMS ALL SUCH WARRANTIES, REPRESENTATIONS OR GUARANTEES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR ANY PARTICULAR PURPOSE, AS TO: (A) THE FUNCTIONALITY OR NONINFRINGEMENT OF PROGRAM, ANY MODIFICATION, A COMBINED WORK OR AN AGGREGATE WORK; OR (B) THE RESULTS OF ANY PROJECT UNDERTAKEN USING THE PROGRAM, ANY MODIFICATION, A COMBINED WORK OR AN AGGREGATE WORK. IN NO EVENT SHALL THE CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, CONSEQUENTIAL OR ANY OTHER DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THE PROGRAM, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. YOU HEREBY WAIVE ANY CLAIMS FOR DAMAGES OF ANY KIND AGAINST CONTRIBUTORS WHICH MAY RESULT FROM YOUR USE OF THE PROGRAM. 
<P><I>B. Requirements for a Distribution of Modifiable Code</I> 
<P>If you distribute the Program in a form to which the recipient can make Modifications (e.g. source code), the terms of this license apply to use by recipient. In addition, each source and data file of the Program and any Modification you distribute must contain the following notice: 
<P>"Copyright (c) 2000- (insert then current year) OCLC Online Computer Library Center, Inc. and other contributors. All rights reserved. The contents of this file, as updated from time to time by the OCLC Office of Research, are subject to OCLC Research Public License Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a current copy of the License at http://purl.oclc.org/oclc/research/ORPL/. Software distributed under the License is distributed on an "AS IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for the specific language governing rights and limitations under the License. This software consists of voluntary contributions made by many individuals on behalf of OCLC Research. For more information on OCLC Research, please see http://www.oclc.org/oclc/research/. The Original Code is ______________________________. The Initial Developer of the Original Code is ________________________. Portions created by ______________________ are Copyright (C) _____ _______________________. All Rights Reserved. Contributor(s): ______________________________________." 
<P><I>C. Requirements for a Distribution of Non-modifiable Code</I> 
<P>If you distribute the Program in a form to which the recipient cannot make Modifications (e.g. object code), the terms of this license apply to use by recipient and you must include the following statement in appropriate and conspicuous locations: 
<P>"Copyright (c) 2000- (insert then current year) OCLC Online Computer Library Center, Inc. and other contributors. All rights reserved." 
<P>In addition, the source code must be included with the object code distribution or the distributor must provide the source code to the recipient upon request. 
<P><I>D. Requirements for a Combined Work Distribution</I> 
<P>Distributions of Combined Works are subject to the terms of this license and must be made at no charge to the recipient beyond the costs of physically transferring the files to recipient. 
<P>A Combined Work may be distributed as either modifiable or non-modifiable code. The requirements of Section 3.B or 3.C above (as appropriate) apply to such distributions. 
<P>An "Aggregate Work" is when the Program exists, without integration, with other programs on a storage medium. This License does not apply to portions of an Aggregate Work which are not covered by the definition of "Program" provided in this License. You are not forbidden from selling an Aggregate Work. However, the Program contained in an Aggregate Work is subject to this License. Also, should the Program be extracted from an Aggregate Work, this License applies to any use of the Program apart from the Aggregate Work. 
<P><B>Section 4. License Grant</B> 
<P>For purposes of permitting use of your Modifications by OCLC and other licensees hereunder, you hereby grant to OCLC and such other licensees the non-exclusive, worldwide, royalty- free, transferable, sublicenseable license to execute, copy, alter, delete, modify, adapt, change, revise, enhance, develop, publicly display, distribute (internally and externally) and/or create derivative works based on your Modifications (and derivative works thereof) in accordance with these Terms. This Section 4 shall survive termination of this License for any reason. 
<P><B>Section 5. Termination of Rights</B> 
<P>This non-exclusive license (with respect to the grant from a particular Contributor) automatically terminates for any entity that initiates legal action for intellectual property infringement (with respect to the Program) against such Contributor as of the initiation of such action. 
<P>If you fail to comply with this License, your rights (but not your obligations) under this License shall terminate automatically unless you cure such breach within thirty (30) days of becoming aware of the noncompliance. All sublicenses granted by you which preexist such termination and are properly granted shall survive such termination. 
<P><B>Section 6. Other Terms</B> 
<P>Except for the copyright notices required above, you may not use any trademark of any of the Contributors without the prior written consent of the relevant Contributor. You agree not to remove, alter or obscure any copyright or other proprietary rights notice contained in the Program. 
<P>All transfers of the Program or any part thereof shall be made in compliance with U.S. import/export regulations or other restrictions of the U.S. Department of Commerce, as well as other similar trade or commerce restrictions which might apply. 
<P>Any patent obtained by any party covering the Program or any part thereof must include a provision providing for the free, perpetual and unrestricted commercial and noncommercial use by any third party. 
<P>If, as a consequence of a court judgment or settlement relating to intellectual property infringement or any other cause of action, conditions are imposed on you that contradict the conditions of this License, such conditions do not excuse you from compliance with this License. If you cannot distribute the Program so as to simultaneously satisfy your obligations under this License and such other conditions, you may not distribute the Program at all. For example, if a patent license would not permit royalty-free redistribution of the Program by all those who receive copies directly or indirectly through you, you could not satisfy both the patent license and this License, and you would be required to refrain entirely from distribution of the Program. 
<P>If you learn of a third party claim or other restriction relating to a Program you have already distributed you shall promptly redo your Program to address the issue and take all reasonable steps to inform those who may have received the Program at issue. An example of an appropriate reasonable step to inform would be posting an announcement on an appropriate web bulletin board. 
<P>The provisions of this License are deemed to be severable, and the invalidity or unenforceability of any provision shall not affect or impair the remaining provisions which shall continue in full force and effect. In substitution for any provision held unlawful, there shall be substituted a provision of similar import reflecting the original intent of the parties hereto to the extent permissible under law. 
<P>The Original Contributor from time to time may change this License, and the amended license will apply to all copies of the Program downloaded after the new license is posted. This License grants only the rights expressly stated herein and provides you with no implied rights or licenses to the intellectual property of any Contributor. 
<P>This License is the complete and exclusive statement of the agreement between the parties concerning the subject matter hereof and may not be amended except by the written agreement of the parties. This License shall be governed by and construed in accordance with the laws of the State of Ohio and the United States of America, without regard to principles of conflicts of law. OCLC Research Public License 2.0 </P>',
),
146 => 
array (
'license_list_pk' => 147,
'wts_key' => 0,
'license_identifier' => 'ODbL-1.0',
'license_fullname' => 'ODC Open Database License v1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
147 => 
array (
'license_list_pk' => 148,
'wts_key' => 0,
'license_identifier' => 'PDDL-1.0',
'license_fullname' => 'ODC Public Domain Dedication & License 1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
148 => 
array (
'license_list_pk' => 149,
'wts_key' => 33,
'license_identifier' => 'OGTSL',
'license_fullname' => 'Open Group Test Suite License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H2>The Open Group Test Suite License</H2>
<P>Preamble</P>
<P>The intent of this document is to state the conditions under which a Package may be copied, such that the Copyright Holder maintains some semblance of artistic control over the development of the package, while giving the users of the package the right to use and distribute the Package in a more-or-less customary fashion, plus the right to make reasonable modifications.</P>
<P>Testing is essential for proper development and maintenance of standards-based products.</P>
<P>For buyers: adequate conformance testing leads to reduced integration costs and protection of investments in applications, software and people.</P>
<P>For software developers: conformance testing of platforms and middleware greatly reduces the cost of developing and maintaining multi-platform application software.</P>
<P>For suppliers: In-depth testing increases customer satisfaction and keeps development and support costs in check. API conformance is highly measurable and suppliers who claim it must be able to substantiate that claim.</P>
<P>As such, since these are benchmark measures of conformance, we feel the integrity of test tools is of importance. In order to preserve the integrity of the existing conformance modes of this test package and to permit recipients of modified versions of this package to run the original test modes, this license requires that the original test modes be preserved.</P>
<P>If you find a bug in one of the standards mode test cases, please let us know so we can feed this back into the original, and also raise any specification issues with the appropriate bodies (for example the POSIX committees).</P>
<P>Definitions: </P>
<UL>
<LI>"Package" refers to the collection of files distributed by the Copyright Holder, and derivatives of that collection of files created through textual modification. 
<LI>"Standard Version" refers to such a Package if it has not been modified, or has been modified in accordance with the wishes of the Copyright Holder. 
<LI>"Copyright Holder" is whoever is named in the copyright or copyrights for the package. "You" is you, if you\'re thinking about copying or distributing this Package. 
<LI>"Reasonable copying fee" is whatever you can justify on the basis of media cost, duplication charges, time of people involved, and so on. (You will not be required to justify it to the Copyright Holder, but only to the computing community at large as a market that must bear the fee.) 
<LI>"Freely Available" means that no fee is charged for the item itself, though there may be fees involved in handling the item. It also means that recipients of the item may redistribute it under the same conditions they received it. </LI></UL>
<P>1. You may make and give away verbatim copies of the source form of the Standard Version of this Package without restriction, provided that you duplicate all of the original copyright notices and associated disclaimers.</P>
<P>2. You may apply bug fixes, portability fixes and other modifications derived from the Public Domain or from the Copyright Holder. A Package modified in such a way shall still be considered the Standard Version.</P>
<BLOCKQUOTE></BLOCKQUOTE>
<P>3. You may otherwise modify your copy of this Package in any way, provided that you insert a prominent notice in each changed file stating how and when you changed that file, and provided that you do at least the following:</P>
<BLOCKQUOTE>
<P>rename any non-standard executables and testcases so the names do not conflict with standard executables and testcases, which must also be provided, and provide a separate manual page for each non-standard executable and testcase that clearly documents how it differs from the Standard Version.</P></BLOCKQUOTE>
<P></P>
<P>4. You may distribute the programs of this Package in object code or executable form, provided that you do at least the following: </P>
<BLOCKQUOTE>
<P>accompany any non-standard executables and testcases with their corresponding Standard Version executables and testcases, giving the non-standard executables and testcases non-standard names, and clearly documenting the differences in manual pages (or equivalent), together with instructions on where to get the Standard Version.</P></BLOCKQUOTE>
<P>5. You may charge a reasonable copying fee for any distribution of this Package. You may charge any fee you choose for support of this Package. You may not charge a fee for this Package itself. However, you may distribute this Package in aggregate with other (possibly commercial) programs as part of a larger (possibly commercial) software distribution provided that you do not advertise this Package as a product of your own.</P>
<P>6. The scripts and library files supplied as input to or produced as output from the programs of this Package do not automatically fall under the copyright of this Package, but belong to whomever generated them, and may be sold commercially, and may be aggregated with this Package.</P>
<P>7.Subroutines supplied by you and linked into this Package shall not be considered part of this Package. </P>
<P>8. The name of the Copyright Holder may not be used to endorse or promote products derived from this software without specific prior written permission.</P>
<P>9. THIS PACKAGE IS PROVIDED "AS IS" AND WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF MERCHANTIBILITY AND FITNESS FOR A PARTICULAR PURPOSE. </P>
<P>The End</P>',
),
149 => 
array (
'license_list_pk' => 150,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.2.2',
'license_fullname' => 'Open LDAP Public License 2.2.2',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
150 => 
array (
'license_list_pk' => 151,
'wts_key' => 0,
'license_identifier' => 'OLDAP-1.1',
'license_fullname' => 'Open LDAP Public License v1.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
151 => 
array (
'license_list_pk' => 152,
'wts_key' => 0,
'license_identifier' => 'OLDAP-1.2',
'license_fullname' => 'Open LDAP Public License v1.2',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
152 => 
array (
'license_list_pk' => 153,
'wts_key' => 0,
'license_identifier' => 'OLDAP-1.3',
'license_fullname' => 'Open LDAP Public License v1.3',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
153 => 
array (
'license_list_pk' => 154,
'wts_key' => 0,
'license_identifier' => 'OLDAP-1.4',
'license_fullname' => 'Open LDAP Public License v1.4',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
154 => 
array (
'license_list_pk' => 155,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.0',
'license_fullname' => 'Open LDAP Public License v2.0 (or possibly 2.0A and 2.0B)',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
155 => 
array (
'license_list_pk' => 156,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.0.1',
'license_fullname' => 'Open LDAP Public License v2.0.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
156 => 
array (
'license_list_pk' => 157,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.1',
'license_fullname' => 'Open LDAP Public License v2.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
157 => 
array (
'license_list_pk' => 158,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.2',
'license_fullname' => 'Open LDAP Public License v2.2',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
158 => 
array (
'license_list_pk' => 159,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.2.1',
'license_fullname' => 'Open LDAP Public License v2.2.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
159 => 
array (
'license_list_pk' => 160,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.3',
'license_fullname' => 'Open LDAP Public License v2.3',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
160 => 
array (
'license_list_pk' => 161,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.4',
'license_fullname' => 'Open LDAP Public License v2.4',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
161 => 
array (
'license_list_pk' => 162,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.5',
'license_fullname' => 'Open LDAP Public License v2.5',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
162 => 
array (
'license_list_pk' => 163,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.6',
'license_fullname' => 'Open LDAP Public License v2.6',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
163 => 
array (
'license_list_pk' => 164,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.7',
'license_fullname' => 'Open LDAP Public License v2.7',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
164 => 
array (
'license_list_pk' => 165,
'wts_key' => 0,
'license_identifier' => 'OPL-1.0',
'license_fullname' => 'Open Public License v1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
165 => 
array (
'license_list_pk' => 166,
'wts_key' => 0,
'license_identifier' => 'OSL-1.0',
'license_fullname' => 'Open Software License 1.0',
'license_matchname_1' => 'OpenSoftware',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
166 => 
array (
'license_list_pk' => 167,
'wts_key' => 0,
'license_identifier' => 'OSL-2.0',
'license_fullname' => 'Open Software License 2.0',
'license_matchname_1' => 'OpenSoftware2.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
167 => 
array (
'license_list_pk' => 168,
'wts_key' => 0,
'license_identifier' => 'OSL-2.1',
'license_fullname' => 'Open Software License 2.1',
'license_matchname_1' => 'OpenSoftware2.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
168 => 
array (
'license_list_pk' => 169,
'wts_key' => 0,
'license_identifier' => 'OSL-3.0',
'license_fullname' => 'Open Software License 3.0',
'license_matchname_1' => 'OpenSoftware3.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
169 => 
array (
'license_list_pk' => 170,
'wts_key' => 0,
'license_identifier' => 'OLDAP-2.8',
'license_fullname' => 'OpenLDAP Public License v2.8',
'license_matchname_1' => 'OpenLDAP2.8',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
170 => 
array (
'license_list_pk' => 171,
'wts_key' => 0,
'license_identifier' => 'OpenSSL',
'license_fullname' => 'OpenSSL License',
'license_matchname_1' => 'OpenSSL',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
171 => 
array (
'license_list_pk' => 172,
'wts_key' => 0,
'license_identifier' => 'PHP-3.0',
'license_fullname' => 'PHP License v3.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
172 => 
array (
'license_list_pk' => 173,
'wts_key' => 0,
'license_identifier' => 'PHP-3.01',
'license_fullname' => 'PHP LIcense v3.01',
'license_matchname_1' => 'PHP3.01',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
173 => 
array (
'license_list_pk' => 174,
'wts_key' => 0,
'license_identifier' => 'PostgreSQL',
'license_fullname' => 'PostgreSQL License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
174 => 
array (
'license_list_pk' => 175,
'wts_key' => 0,
'license_identifier' => 'Python-2.0',
'license_fullname' => 'Python License 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
175 => 
array (
'license_list_pk' => 176,
'wts_key' => 0,
'license_identifier' => 'QPL-1.0',
'license_fullname' => 'Q Public License 1.0',
'license_matchname_1' => 'QPL',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
176 => 
array (
'license_list_pk' => 177,
'wts_key' => 39,
'license_identifier' => 'RPSL-1.0',
'license_fullname' => 'RealNetworks Public Source License v1.0',
'license_matchname_1' => 'RPSL1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H2>RealNetworks Public Source License Version 1.0</H2>
<DIV class=app>
<DIV class=h3 id=subdomaincontent>
<P>1. <STRONG>General Definitions.</STRONG> This License applies to any program or other work which RealNetworks, Inc., or any other entity that elects to use this license, ("Licensor") makes publicly available and which contains a notice placed by Licensor identifying such program or work as "Original Code" and stating that it is subject to the terms of this RealNetworks Public Source License version 1.0 (or subsequent version thereof) ("License"). You are not required to accept this License. However, nothing else grants You permission to use, copy, modify or distribute the software or its derivative works. These actions are prohibited by law if You do not accept this License. Therefore, by modifying, copying or distributing the software (or any work based on the software), You indicate your acceptance of this License to do so, and all its terms and conditions. In addition, you agree to the terms of this License by clicking the Accept button or downloading the software. As used in this License:</P>
<P>1.1 "Applicable Patent Rights" mean: (a) in the case where Licensor is the grantor of rights, claims of patents that (i) are now or hereafter acquired, owned by or assigned to Licensor and (ii) are necessarily infringed by using or making the Original Code alone and not in combination with other software or hardware; and (b) in the case where You are the grantor of rights, claims of patents that (i) are now or hereafter acquired, owned by or assigned to You and (ii) are infringed (directly or indirectly) by using or making Your Modifications, taken alone or in combination with Original Code.</P>
<P>1.2 "Compatible Source License" means any one of the licenses listed on Exhibit B or at <A href="https://www.helixcommunity.org/content/complicense">https://www.helixcommunity.org/content/complicense</A> or other licenses specifically identified by Licensor in writing. Notwithstanding any term to the contrary in any Compatible Source License, any code covered by any Compatible Source License that is used with Covered Code must be made readily available in Source Code format for royalty-free use under the terms of the Compatible Source License or this License.</P>
<P>1.3 "Contributor" means any person or entity that creates or contributes to the creation of Modifications.</P>
<P>1.4 "Covered Code" means the Original Code, Modifications, the combination of Original Code and any Modifications, and/or any respective portions thereof.</P>
<P>1.5 "Deploy" means to use, sublicense or distribute Covered Code other than for Your internal research and development (R&amp;D) and/or Personal Use, and includes without limitation, any and all internal use or distribution of Covered Code within Your business or organization except for R&amp;D use and/or Personal Use, as well as direct or indirect sublicensing or distribution of Covered Code by You to any third party in any form or manner.</P>
<P>1.6 "Derivative Work" means either the Covered Code or any derivative work under United States copyright law, and including any work containing or including any portion of the Covered Code or Modifications, either verbatim or with modifications and/or translated into another language. Derivative Work also includes any work which combines any portion of Covered Code or Modifications with code not otherwise governed by the terms of this License.</P>
<P>1.7 "Externally Deploy" means to Deploy the Covered Code in any way that may be accessed or used by anyone other than You, used to provide any services to anyone other than You, or used in any way to deliver any content to anyone other than You, whether the Covered Code is distributed to those parties, made available as an application intended for use over a computer network, or used to provide services or otherwise deliver content to anyone other than You.</P>
<P>1.8. "Interface" means interfaces, functions, properties, class definitions, APIs, header files, GUIDs, V-Tables, and/or protocols allowing one piece of software, firmware or hardware to communicate or interoperate with another piece of software, firmware or hardware.</P>
<P>1.9 "Modifications" mean any addition to, deletion from, and/or change to, the substance and/or structure of the Original Code, any previous Modifications, the combination of Original Code and any previous Modifications, and/or any respective portions thereof. When code is released as a series of files, a Modification is: (a) any addition to or deletion from the contents of a file containing Covered Code; and/or (b) any new file or other representation of computer program statements that contains any part of Covered Code.</P>
<P>1.10 "Original Code" means (a) the Source Code of a program or other work as originally made available by Licensor under this License, including the Source Code of any updates or upgrades to such programs or works made available by Licensor under this License, and that has been expressly identified by Licensor as such in the header file(s) of such work; and (b) the object code compiled from such Source Code and originally made available by Licensor under this License.</P>
<P>1.11 "Personal Use" means use of Covered Code by an individual solely for his or her personal, private and non-commercial purposes. An individual\'s use of Covered Code in his or her capacity as an officer, employee, member, independent contractor or agent of a corporation, business or organization (commercial or non-commercial) does not qualify as Personal Use.</P>
<P>1.12 "Source Code" means the human readable form of a program or other work that is suitable for making modifications to it, including all modules it contains, plus any associated interface definition files, scripts used to control compilation and installation of an executable (object code).</P>
<P>1.13 "You" or "Your" means an individual or a legal entity exercising rights under this License. For legal entities, "You" or "Your" includes any entity which controls, is controlled by, or is under common control with, You, where "control" means (a) the power, direct or indirect, to cause the direction or management of such entity, whether by contract or otherwise, or (b) ownership of fifty percent (50%) or more of the outstanding shares or beneficial ownership of such entity.</P>
<P>2. <STRONG>Permitted Uses</STRONG>; <B>Conditions &amp; Restrictions.</B> Subject to the terms and conditions of this License, Licensor hereby grants You, effective on the date You accept this License (via downloading or using Covered Code or otherwise indicating your acceptance of this License), a worldwide, royalty-free, non-exclusive copyright license, to the extent of Licensor\'s copyrights cover the Original Code, to do the following:</P>
<P>2.1 You may reproduce, display, perform, modify and Deploy Covered Code, provided that in each instance:</P>
<P>(a) You must retain and reproduce in all copies of Original Code the copyright and other proprietary notices and disclaimers of Licensor as they appear in the Original Code, and keep intact all notices in the Original Code that refer to this License;</P>
<P>(b) You must include a copy of this License with every copy of Source Code of Covered Code and documentation You distribute, and You may not offer or impose any terms on such Source Code that alter or restrict this License or the recipients\' rights hereunder, except as permitted under Section 6;</P>
<P>(c) You must duplicate, to the extent it does not already exist, the notice in Exhibit A in each file of the Source Code of all Your Modifications, and cause the modified files to carry prominent notices stating that You changed the files and the date of any change;</P>
<P>(d) You must make Source Code of all Your Externally Deployed Modifications publicly available under the terms of this License, including the license grants set forth in Section 3 below, for as long as you Deploy the Covered Code or twelve (12) months from the date of initial Deployment, whichever is longer. You should preferably distribute the Source Code of Your Deployed Modifications electronically (e.g. download from a web site); and</P>
<P>(e) if You Deploy Covered Code in object code, executable form only, You must include a prominent notice, in the code itself as well as in related documentation, stating that Source Code of the Covered Code is available under the terms of this License with information on how and where to obtain such Source Code. You must also include the Object Code Notice set forth in Exhibit A in the "about" box or other appropriate place where other copyright notices are placed, including any packaging materials.</P>
<P>2.2 You expressly acknowledge and agree that although Licensor and each Contributor grants the licenses to their respective portions of the Covered Code set forth herein, no assurances are provided by Licensor or any Contributor that the Covered Code does not infringe the patent or other intellectual property rights of any other entity. Licensor and each Contributor disclaim any liability to You for claims brought by any other entity based on infringement of intellectual property rights or otherwise. As a condition to exercising the rights and licenses granted hereunder, You hereby assume sole responsibility to secure any other intellectual property rights needed, if any. For example, if a third party patent license is required to allow You to make, use, sell, import or offer for sale the Covered Code, it is Your responsibility to acquire such license(s).</P>
<P>2.3 Subject to the terms and conditions of this License, Licensor hereby grants You, effective on the date You accept this License (via downloading or using Covered Code or otherwise indicating your acceptance of this License), a worldwide, royalty-free, perpetual, non-exclusive patent license under Licensor\'s Applicable Patent Rights to make, use, sell, offer for sale and import the Covered Code, provided that in each instance you comply with the terms of this License.</P>
<P>3. <STRONG>Your Grants.</STRONG> In consideration of, and as a condition to, the licenses granted to You under this License:</P>
<P>(a) You grant to Licensor and all third parties a non-exclusive, perpetual, irrevocable, royalty free license under Your Applicable Patent Rights and other intellectual property rights owned or controlled by You, to make, sell, offer for sale, use, import, reproduce, display, perform, modify, distribute and Deploy Your Modifications of the same scope and extent as Licensor\'s licenses under Sections 2.1 and 2.2; and</P>
<P>(b) You grant to Licensor and its subsidiaries a non-exclusive, worldwide, royalty-free, perpetual and irrevocable license, under Your Applicable Patent Rights and other intellectual property rights owned or controlled by You, to make, use, sell, offer for sale, import, reproduce, display, perform, distribute, modify or have modified (for Licensor and/or its subsidiaries), sublicense and distribute Your Modifications, in any form and for any purpose, through multiple tiers of distribution.</P>
<P>(c) You agree not use any information derived from Your use and review of the Covered Code, including but not limited to any algorithms or inventions that may be contained in the Covered Code, for the purpose of asserting any of Your patent rights, or assisting a third party to assert any of its patent rights, against Licensor or any Contributor.</P>
<P>4. <STRONG>Derivative Works.</STRONG> You may create a Derivative Work by combining Covered Code with other code not otherwise governed by the terms of this License and distribute the Derivative Work as an integrated product. In each such instance, You must make sure the requirements of this License are fulfilled for the Covered Code or any portion thereof, including all Modifications.</P>
<P>4.1 You must cause any Derivative Work that you distribute, publish or Externally Deploy, that in whole or in part contains or is derived from the Covered Code or any part thereof, to be licensed as a whole at no charge to all third parties under the terms of this License and no other license except as provided in Section 4.2. You also must make Source Code available for the Derivative Work under the same terms as Modifications, described in Sections 2 and 3, above.</P>
<P>4.2 Compatible Source Licenses. Software modules that have been independently developed without any use of Covered Code and which contain no portion of the Covered Code, Modifications or other Derivative Works, but are used or combined in any way wtih the Covered Code or any Derivative Work to form a larger Derivative Work, are exempt from the conditions described in Section 4.1 but only to the extent that: the software module, including any software that is linked to, integrated with, or part of the same applications as, the software module by any method must be wholly subject to one of the Compatible Source Licenses. <B>Notwithstanding the foregoing, all Covered Code must be subject to the terms of this License.</B> Thus, the entire Derivative Work must be licensed under a combination of the RPSL (for Covered Code) and a Compatible Source License for any independently developed software modules within the Derivative Work. The foregoing requirement applies even if the Compatible Source License would ordinarily allow the software module to link with, or form larger works with, other software that is not subject to the Compatible Source License. For example, although the Mozilla Public License v1.1 allows Mozilla code to be combined with proprietary software that is not subject to the MPL, if MPL-licensed code is used with Covered Code the MPL-licensed code could not be combined or linked with any code not governed by the MPL. The general intent of this section 4.2 is to enable use of Covered Code with applications that are wholly subject to an acceptable open source license. You are responsible for determining whether your use of software with Covered Code is allowed under Your license to such software.</P>
<P>4.3 Mere aggregation of another work not based on the Covered Code with the Covered Code (or with a work based on the Covered Code) on a volume of a storage or distribution medium does not bring the other work under the scope of this License. If You deliver the Covered Code for combination and/or integration with an application previously provided by You (for example, via automatic updating technology), such combination and/or integration constitutes a Derivative Work subject to the terms of this License.</P>
<P>5. <B>Exclusions From License Grant</B>. Nothing in this License shall be deemed to grant any rights to trademarks, copyrights, patents, trade secrets or any other intellectual property of Licensor or any Contributor except as expressly stated herein. No right is granted to the trademarks of Licensor or any Contributor even if such marks are included in the Covered Code. Nothing in this License shall be interpreted to prohibit Licensor from licensing under different terms from this License any code that Licensor otherwise would have a right to license. Modifications, Derivative Works and/or any use or combination of Covered Code with other technology provided by Licensor or third parties may require additional patent licenses from Licensor which Licensor may grant in its sole discretion. No patent license is granted separate from the Original Code or combinations of the Original Code with other software or hardware.</P>
<P>5.1. <STRONG>Trademarks.</STRONG> This License does not grant any rights to use the trademarks or trade names owned by Licensor ("Licensor Marks" defined in Exhibit C) or to any trademark or trade name belonging to any Contributor. No Licensor Marks may be used to endorse or promote products derived from the Original Code other than as permitted by the Licensor Trademark Policy defined in Exhibit C.</P>
<P>6. <STRONG>Additional Terms.</STRONG> You may choose to offer, and to charge a fee for, warranty, support, indemnity or liability obligations and/or other rights consistent with the scope of the license granted herein ("Additional Terms") to one or more recipients of Covered Code. However, You may do so only on Your own behalf and as Your sole responsibility, and not on behalf of Licensor or any Contributor. You must obtain the recipient\'s agreement that any such Additional Terms are offered by You alone, and You hereby agree to indemnify, defend and hold Licensor and every Contributor harmless for any liability incurred by or claims asserted against Licensor or such Contributor by reason of any such Additional Terms.</P>
<P>7. <STRONG>Versions of the License.</STRONG> Licensor may publish revised and/or new versions of this License from time to time. Each version will be given a distinguishing version number. Once Original Code has been published under a particular version of this License, You may continue to use it under the terms of that version. You may also choose to use such Original Code under the terms of any subsequent version of this License published by Licensor. No one other than Licensor has the right to modify the terms applicable to Covered Code created under this License.</P>
<P>8. <STRONG>NO WARRANTY OR SUPPORT.</STRONG> The Covered Code may contain in whole or in part pre-release, untested, or not fully tested works. The Covered Code may contain errors that could cause failures or loss of data, and may be incomplete or contain inaccuracies. You expressly acknowledge and agree that use of the Covered Code, or any portion thereof, is at Your sole and entire risk. THE COVERED CODE IS PROVIDED "AS IS" AND WITHOUT WARRANTY, UPGRADES OR SUPPORT OF ANY KIND AND LICENSOR AND LICENSOR\'S LICENSOR(S) (COLLECTIVELY REFERRED TO AS "LICENSOR" FOR THE PURPOSES OF SECTIONS 8 AND 9) AND ALL CONTRIBUTORS EXPRESSLY DISCLAIM ALL WARRANTIES AND/OR CONDITIONS, EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES AND/OR CONDITIONS OF MERCHANTABILITY, OF SATISFACTORY QUALITY, OF FITNESS FOR A PARTICULAR PURPOSE, OF ACCURACY, OF QUIET ENJOYMENT, AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. LICENSOR AND EACH CONTRIBUTOR DOES NOT WARRANT AGAINST INTERFERENCE WITH YOUR ENJOYMENT OF THE COVERED CODE, THAT THE FUNCTIONS CONTAINED IN THE COVERED CODE WILL MEET YOUR REQUIREMENTS, THAT THE OPERATION OF THE COVERED CODE WILL BE UNINTERRUPTED OR ERROR-FREE, OR THAT DEFECTS IN THE COVERED CODE WILL BE CORRECTED. NO ORAL OR WRITTEN DOCUMENTATION, INFORMATION OR ADVICE GIVEN BY LICENSOR, A LICENSOR AUTHORIZED REPRESENTATIVE OR ANY CONTRIBUTOR SHALL CREATE A WARRANTY. You acknowledge that the Covered Code is not intended for use in high risk activities, including, but not limited to, the design, construction, operation or maintenance of nuclear facilities, aircraft navigation, aircraft communication systems, or air traffic control machines in which case the failure of the Covered Code could lead to death, personal injury, or severe physical or environmental damage. Licensor disclaims any express or implied warranty of fitness for such uses.</P>
<P>9. <STRONG>LIMITATION OF LIABILITY.</STRONG> TO THE EXTENT NOT PROHIBITED BY LAW, IN NO EVENT SHALL LICENSOR OR ANY CONTRIBUTOR BE LIABLE FOR ANY INCIDENTAL, SPECIAL, INDIRECT OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR RELATING TO THIS LICENSE OR YOUR USE OR INABILITY TO USE THE COVERED CODE, OR ANY PORTION THEREOF, WHETHER UNDER A THEORY OF CONTRACT, WARRANTY, TORT (INCLUDING NEGLIGENCE OR STRICT LIABILITY), PRODUCTS LIABILITY OR OTHERWISE, EVEN IF LICENSOR OR SUCH CONTRIBUTOR HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES AND NOTWITHSTANDING THE FAILURE OF ESSENTIAL PURPOSE OF ANY REMEDY. SOME JURISDICTIONS DO NOT ALLOW THE LIMITATION OF LIABILITY OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THIS LIMITATION MAY NOT APPLY TO YOU. In no event shall Licensor\'s total liability to You for all damages (other than as may be required by applicable law) under this License exceed the amount of ten dollars ($10.00).</P>
<P>10. <STRONG>Ownership.</STRONG> Subject to the licenses granted under this License, each Contributor retains all rights, title and interest in and to any Modifications made by such Contributor. Licensor retains all rights, title and interest in and to the Original Code and any Modifications made by or on behalf of Licensor ("Licensor Modifications"), and such Licensor Modifications will not be automatically subject to this License. Licensor may, at its sole discretion, choose to license such Licensor Modifications under this License, or on different terms from those contained in this License or may choose not to license them at all.</P>
<P>11. <STRONG>Termination</STRONG>.</P>
<P>11.1 Term and Termination. The term of this License is perpetual unless terminated as provided below. This License and the rights granted hereunder will terminate:</P>
<P>(a) automatically without notice from Licensor if You fail to comply with any term(s) of this License and fail to cure such breach within 30 days of becoming aware of such breach;</P>
<P>(b) immediately in the event of the circumstances described in Section 12.5(b); or</P>
<P>(c) automatically without notice from Licensor if You, at any time during the term of this License, commence an action for patent infringement against Licensor (including by cross-claim or counter claim in a lawsuit);</P>
<P>(d) upon written notice from Licensor if You, at any time during the term of this License, commence an action for patent infringement against any third party alleging that the Covered Code itself (excluding combinations with other software or hardware) infringes any patent (including by cross-claim or counter claim in a lawsuit).</P>
<P>11.2 Effect of Termination. Upon termination, You agree to immediately stop any further use, reproduction, modification, sublicensing and distribution of the Covered Code and to destroy all copies of the Covered Code that are in your possession or control. All sublicenses to the Covered Code which have been properly granted prior to termination shall survive any termination of this License. Provisions which, by their nature, should remain in effect beyond the termination of this License shall survive, including but not limited to Sections 3, 5, 8, 9, 10, 11, 12.2 and 13. No party will be liable to any other for compensation, indemnity or damages of any sort solely as a result of terminating this License in accordance with its terms, and termination of this License will be without prejudice to any other right or remedy of any party.</P>
<P>12. <STRONG>Miscellaneous.</STRONG></P>
<P>12.1 Government End Users. The Covered Code is a "commercial item" as defined in FAR 2.101. Government software and technical data rights in the Covered Code include only those rights customarily provided to the public as defined in this License. This customary commercial license in technical data and software is provided in accordance with FAR 12.211 (Technical Data) and 12.212 (Computer Software) and, for Department of Defense purchases, DFAR 252.227-7015 (Technical Data -- Commercial Items) and 227.7202-3 (Rights in Commercial Computer Software or Computer Software Documentation). Accordingly, all U.S. Government End Users acquire Covered Code with only those rights set forth herein.</P>
<P>12.2 Relationship of Parties. This License will not be construed as creating an agency, partnership, joint venture or any other form of legal association between or among You, Licensor or any Contributor, and You will not represent to the contrary, whether expressly, by implication, appearance or otherwise.</P>
<P>12.3 Independent Development. Nothing in this License will impair Licensor\'s right to acquire, license, develop, have others develop for it, market and/or distribute technology or products that perform the same or similar functions as, or otherwise compete with, Modifications, Derivative Works, technology or products that You may develop, produce, market or distribute.</P>
<P>12.4 Waiver; Construction. Failure by Licensor or any Contributor to enforce any provision of this License will not be deemed a waiver of future enforcement of that or any other provision. Any law or regulation which provides that the language of a contract shall be construed against the drafter will not apply to this License.</P>
<P>12.5 Severability. (a) If for any reason a court of competent jurisdiction finds any provision of this License, or portion thereof, to be unenforceable, that provision of the License will be enforced to the maximum extent permissible so as to effect the economic benefits and intent of the parties, and the remainder of this License will continue in full force and effect. (b) Notwithstanding the foregoing, if applicable law prohibits or restricts You from fully and/or specifically complying with Sections 2 and/or 3 or prevents the enforceability of either of those Sections, this License will immediately terminate and You must immediately discontinue any use of the Covered Code and destroy all copies of it that are in your possession or control.</P>
<P>12.6 Dispute Resolution. Any litigation or other dispute resolution between You and Licensor relating to this License shall take place in the Seattle, Washington, and You and Licensor hereby consent to the personal jurisdiction of, and venue in, the state and federal courts within that District with respect to this License. The application of the United Nations Convention on Contracts for the International Sale of Goods is expressly excluded.</P>
<P>12.7 Export/Import Laws. This software is subject to all export and import laws and restrictions and regulations of the country in which you receive the Covered Code and You are solely responsible for ensuring that You do not export, re-export or import the Covered Code or any direct product thereof in violation of any such restrictions, laws or regulations, or without all necessary authorizations.</P>
<P>12.8 Entire Agreement; Governing Law. This License constitutes the entire agreement between the parties with respect to the subject matter hereof. This License shall be governed by the laws of the United States and the State of Washington.</P>
<P>Where You are located in the province of Quebec, Canada, the following clause applies: The parties hereby confirm that they have requested that this License and all related documents be drafted in English. Les parties ont exigÃ© que le prÃ©sent contrat et tous les documents connexes soient rÃ©digÃ©s en anglais.</P>
<P></P>
<P><B></B></P>
<P align=center><STRONG>EXHIBIT A.</STRONG></P>
<P>"Copyright (c) 1995-2002 RealNetworks, Inc. and/or its licensors. All Rights Reserved. </P>
<P>The contents of this file, and the files included with this file, are subject to the current version of the RealNetworks Public Source License Version 1.0 (the "RPSL") available at https://www.helixcommunity.org/content/rpsl unless you have licensed the file under the RealNetworks Community Source License Version 1.0 (the "RCSL") available at https://www.helixcommunity.org/content/rcsl, in which case the RCSL will apply. You may also obtain the license terms directly from RealNetworks. You may not use this file except in compliance with the RPSL or, if you have a valid RCSL with RealNetworks applicable to this file, the RCSL. Please see the applicable RPSL or RCSL for the rights, obligations and limitations governing use of the contents of the file.</P>
<P>This file is part of the Helix DNA Technology. RealNetworks is the developer of the Original code and owns the copyrights in the portions it created.</P>
<P>This file, and the files included with this file, is distributed and made available on an \'AS IS\' basis, WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, AND REALNETWORKS HEREBY DISCLAIMS ALL SUCH WARRANTIES, INCLUDING WITHOUT LIMITATION, ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, QUIET ENJOYMENT OR NON-INFRINGEMENT.</P>
<P>Contributor(s): ____________________________________</P>
<P>Technology Compatibility Kit Test Suite(s) Location (if licensed under the RCSL):</P>
<P>________________________________"</P>
<P><B>Object Code Notice:</B><SPAN style="COLOR: black"> Helix DNA Client technology included. Copyright (c) RealNetworks, Inc., 1995-2002. All rights reserved.</P>
<P></P>
<P align=center><B>EXHIBIT B</B></P>
<P>Compatible Source Licenses for the RealNetworks Public Source License. The following list applies to the most recent version of the license as of October 25, 2002, unless otherwise indicated.</P>
<UL>
<LI>Academic Free License 
<LI>Apache Software License 
<LI>Apple Public Source License 
<LI>Artistic license 
<LI>Attribution Assurance Licenses 
<LI>BSD license 
<LI>Common Public License<SUP>1</SUP> 
<LI>Eiffel Forum License 
<LI>GNU General Public License (GPL)<SUP>1</SUP> 
<LI>GNU Library or "Lesser" General Public License (LGPL)<SUP>1</SUP> 
<LI>IBM Public License 
<LI>Intel Open Source License 
<LI>Jabber Open Source License 
<LI>MIT license 
<LI>MITRE Collaborative Virtual Workspace License (CVW License) 
<LI>Motosoto License 
<LI>Mozilla Public License 1.0 (MPL) 
<LI>Mozilla Public License 1.1 (MPL) 
<LI>Nokia Open Source License 
<LI>Open Group Test Suite License 
<LI>Python Software Foundation License 
<LI>Ricoh Source Code Public License 
<LI>Sun Industry Standards Source License (SISSL) 
<LI>Sun Public License 
<LI>University of Illinois/NCSA Open Source License 
<LI>Vovida Software License v. 1.0 
<LI>W3C License 
<LI>X.Net License 
<LI>Zope Public License 
<LI>zlib/libpng license </LI></UL>
<P><SUP>1</SUP>Note: because this license contains certain reciprocal licensing terms that purport to extend to independently developed code, You may be prohibited under the terms of this otherwise compatible license from using code licensed under its terms with Covered Code because Covered Code may only be licensed under the RealNetworks Public Source License. Any attempt to apply non RPSL license terms, including without limitation the GPL, to Covered Code is expressly forbidden. You are responsible for ensuring that Your use of Compatible Source Licensed code does not violate either the RPSL or the Compatible Source License.</P>
<P>The latest version of this list can be found at: <A href="https://www.helixcommunity.org/content/complicense">https://www.helixcommunity.org/content/complicense</A></P>
<P align=center><B>EXHIBIT C</B></P>
<P><STRONG>RealNetworks\' Trademark policy.</STRONG></P>
<P>RealNetworks defines the following trademarks collectively as "Licensor Trademarks": "RealNetworks", "RealPlayer", "RealJukebox", "RealSystem", "RealAudio", "RealVideo", "RealOne Player", "RealMedia", "Helix" or any other trademarks or trade names belonging to RealNetworks.</P>
<P>RealNetworks "Licensor Trademark Policy" forbids any use of Licensor Trademarks except as permitted by and in strict compliance at all times with RealNetworks\' third party trademark usage guidelines which are posted at <A href="http://www.realnetworks.com/info/helixlogo.html">www.realnetworks.com/info/helixlogo.html</A>.</P></SPAN></DIV></DIV>',
),
177 => 
array (
'license_list_pk' => 178,
'wts_key' => 0,
'license_identifier' => 'RPL-1.1',
'license_fullname' => 'Reciprocal Public License 1.1',
'license_matchname_1' => 'RPL1.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
178 => 
array (
'license_list_pk' => 179,
'wts_key' => 0,
'license_identifier' => 'RPL-1.5',
'license_fullname' => 'Reciprocal Public License 1.5',
'license_matchname_1' => 'RPL1.5',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
179 => 
array (
'license_list_pk' => 180,
'wts_key' => 0,
'license_identifier' => 'RHeCos-1.1',
'license_fullname' => 'Red Hat eCos Public License v1.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
180 => 
array (
'license_list_pk' => 181,
'wts_key' => 41,
'license_identifier' => 'RSCPL',
'license_fullname' => 'Ricoh Source Code Public License',
'license_matchname_1' => 'Ricoh',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1>Ricoh Source Code Public License</H1><TT>
<P align=center>Version 1.0</P><B>
<P>1. Definitions. </P></B><B>
<P>1.1.</B> <B>"Contributor"</B> means each entity that creates or contributes to the creation of Modifications. </P><B>
<P>1.2.</B> <B>"Contributor Version"</B> means the combination of the Original Code, prior Modifications used by a Contributor, and the Modifications made by that particular Contributor. </P><B>
<P>1.3.</B> <B>"Electronic Distribution Mechanism"</B> means a website or any other mechanism generally accepted in the software development community for the electronic transfer of data. </P><B>
<P>1.4.</B> <B>"Executable Code"</B> means Governed Code in any form other than Source Code. </P><B>
<P>1.5.</B> <B>"Governed Code"</B> means the Original Code or Modifications or the combination of the Original Code and Modifications, in each case including portions thereof. </P><B>
<P>1.6.</B> <B>"Larger Work" </B>means a work which combines Governed Code or portions thereof with code not governed by the terms of this License. </P><B>
<P>1.7. "Licensable" </B>means the right to grant, to the maximum extent possible, whether at the time of the initial grant or subsequently acquired, any and all of the rights conveyed herein.</P><B>
<P>1.8. "License"</B> means this document. </P><B>
<P>1.9.</B> <B>"Modifications"</B> means any addition to or deletion from the substance or structure of either the Original Code or any previous Modifications. When Governed Code is released as a series of files, a Modification is: </P>
<DIR>
<DIR>
<P>(a) Any addition to or deletion from the contents of a file containing Original Code or previous Modifications. </P>
<P>(b)<B> </B>Any new file that contains any part of the Original Code or previous Modifications. </P></DIR></DIR><B>
<P>1.10.</B> <B>"Original Code"</B> means the "Platform for Information Applications" Source Code as released under this License by RSV. </P><B>
<P>1.11 "Patent Claims" </B>means any patent claim(s), now owned or hereafter acquired, including without limitation, method, process, and apparatus claims, in any patent Licensable by the grantor of a license thereto.<B><I> </P></I>
<P>1.12. "RSV"</B> means Ricoh Silicon Valley, Inc., a <FONT size=3>California corporation with offices at </FONT>2882 Sand Hill Road, Suite 115, Menlo Park, CA 94025-7022.</P>
<P><B>1.13.</B> <B>"Source Code"</B> means the preferred form of the Governed Code for making modifications to it, including all modules it contains, plus any associated interface definition files, scripts used to control compilation and installation of Executable Code, or a list of source code differential comparisons against either the Original Code or another well known, available Governed Code of the Contributor\'s choice. The Source Code can be in a compressed or archival form, provided the appropriate decompression or de-archiving software is widely available for no charge. </P><B>
<P>1.14. "You"</B> means an individual or a legal entity exercising rights under, and complying with all of the terms of, this License or a future version of this License issued under Section 6.1. For legal entities, "You" includes any entity which controls, is controlled by, or is under common control with You. For purposes of this definition, "control" means (a) the power, direct or indirect, to cause the direction or management of such entity, whether by contract or otherwise, or (b) ownership of fifty percent (50%) or more of the outstanding shares or beneficial ownership of such entity.<B><I> </P></B></I><B>
<P>2. Source Code License. </P></B>
<P><B>2.1.</B> <B>Grant from RSV. </B>RSV hereby grants You a worldwide, royalty-free, non-exclusive license, subject to third party intellectual property claims: </P>
<DIR>
<DIR>
<P>(a) to use, reproduce, modify, create derivative works of, display, perform, sublicense and distribute the Original Code (or portions thereof) with or without Modifications, or as part of a Larger Work; and </P>
<P>(b) under Patent Claims infringed by the making, using or selling of Original Code, to make, have made, use, practice, sell, and offer for sale, and/or otherwise dispose of the Original Code (or portions thereof). </P></DIR></DIR><B>
<P>2.2. Contributor Grant. </B>Each Contributor hereby grants You a worldwide, royalty-free, non-exclusive license, subject to third party intellectual property claims: </P>
<DIR>
<DIR>
<P>(a) to use, reproduce, modify, create derivative works of, display, perform, sublicense and distribute the Modifications created by such Contributor (or portions thereof) either on an unmodified basis, with other Modifications, as Governed Code or as part of a Larger Work; and </P>
<P>(b) under Patent Claims infringed by the making, using, or selling of Modifications made by that Contributor either alone and/or in combination with its Contributor Version (or portions of such combination), to make, use, sell, offer for sale, have made, and/or otherwise dispose of: (i) Modifications made by that Contributor (or portions thereof); and (ii) the combination of Modifications made by that Contributor with its Contributor Version (or portions of such combination). </P></DIR></DIR><B>
<P>3. Distribution Obligations. </P></B><B>
<P>3.1. Application of License. </B>The Modifications which You create or to which You contribute are governed by the terms of this License, including without limitation Section 2.2. The Source Code version of Governed Code may be distributed only under the terms of this License or a future version of this License released under Section 6.1, and You must include a copy of this License with every copy of the Source Code You distribute. You may not offer or impose any terms on any Source Code version that alters or restricts the applicable version of this License or the recipients\' rights hereunder. However, You may include an additional document offering the additional rights described in Section 3.5. </P><B>
<P>3.2. Availability of Source Code. </B>Any Modification which You create or to which You contribute must be made available in Source Code form under the terms of this License either on the same media as an Executable Code version or via an Electronic Distribution Mechanism to anyone to whom you made an Executable Code version available; and if made available via an Electronic Distribution Mechanism, must remain available for at least twelve (12) months after the date it initially became available, or at least six (6) months after a subsequent version of that particular Modification has been made available to such recipients. You are responsible for ensuring that the Source Code version remains available even if the Electronic Distribution Mechanism is maintained by a third party. </P><B>
<P>3.3. Description of Modifications. </B>You must cause all Governed Code to which you contribute to contain a file documenting the changes You made to create that Governed Code and the date of any change. You must include a prominent statement that the Modification is derived, directly or indirectly, from Original Code provided by RSV and including the name of RSV in (a) the Source Code, and (b) in any notice in an Executable Code version or related documentation in which You describe the origin or ownership of the Governed Code. </P><B>
<P>3.4. Intellectual Property Matters. </P></B>
<P><B>3.4.1. Third Party Claims.</B> If You have knowledge that a party claims an intellectual property right in particular functionality or code (or its utilization under this License), you must include a text file with the source code distribution titled "LEGAL" which describes the claim and the party making the claim in sufficient detail that a recipient will know whom to contact. If you obtain such knowledge after You make Your Modification available as described in Section 3.2, You shall promptly modify the LEGAL file in all copies You make available thereafter and shall take other steps (such as notifying RSV and appropriate mailing lists or newsgroups) reasonably calculated to inform those who received the Governed Code that new knowledge has been obtained. In the event that You are a Contributor, You represent that, except as disclosed in the LEGAL file, your Modifications are your original creations and, to the best of your knowledge, no third party has any claim (including but not limited to intellectual property claims) relating to your Modifications. You represent that the LEGAL file includes complete details of any license or other restriction associated with any part of your Modifications. </P>
<P><B>3.4.2. Contributor APIs.</B> If Your Modification is an application programming interface and You own or control patents which are reasonably necessary to implement that API, you must also include this information in the LEGAL file. </P><B>
<P>3.5. Required Notices. </B>You must duplicate the notice in Exhibit A in each file of the Source Code, and this License in any documentation for the Source Code, where You describe recipients\' rights relating to Governed Code. If You created one or more Modification(s), You may add your name as a Contributor to the notice described in Exhibit A. If it is not possible to put such notice in a particular Source Code file due to its structure, then you must include such notice in a location (such as a relevant directory file) where a user would be likely to look for such a notice. You may choose to offer, and to charge a fee for, warranty, support, indemnity or liability obligations to one or more recipients of Governed Code. However, You may do so only on Your own behalf, and not on behalf of RSV or any Contributor. You must make it absolutely clear than any such warranty, support, indemnity or liability obligation is offered by You alone, and You hereby agree to indemnify RSV and every Contributor for any liability incurred by RSV or such Contributor as a result of warranty, support, indemnity or liability terms You offer. </P><B>
<P>3.6. Distribution of Executable Code Versions. </B>You may distribute Governed Code in Executable Code form only if the requirements of Section 3.1-3.5 have been met for that Governed Code, and if You include a prominent notice stating that the Source Code version of the Governed Code is available under the terms of this License, including a description of how and where You have fulfilled the obligations of Section 3.2. The notice must be conspicuously included in any notice in an Executable Code version, related documentation or collateral in which You describe recipients\' rights relating to the Governed Code. You may distribute the Executable Code version of Governed Code under a license of Your choice, which may contain terms different from this License, provided that You are in compliance with the terms of this License and that the license for the Executable Code version does not attempt to limit or alter the recipient\'s rights in the Source Code version from the rights set forth in this License. If You distribute the Executable Code version under a different license You must make it absolutely clear that any terms which differ from this License are offered by You alone, not by RSV or any Contributor. You hereby agree to indemnify RSV and every Contributor for any liability incurred by RSV or such Contributor as a result of any such terms You offer. </P><B>
<P>3.7. Larger Works. </B>You may create a Larger Work by combining Governed Code with other code not governed by the terms of this License and distribute the Larger Work as a single product. In such a case, You must make sure the requirements of this License are fulfilled for the Governed Code. </P>
<P></P><B>
<P>4. Inability to Comply Due to Statute or Regulation. </P></B>
<P>If it is impossible for You to comply with any of theterms of this License with respect to some or all of the Governed Code due to statute or regulation then You must: (a) comply with the terms of this License to the maximum extent possible; and (b) describe the limitations and the code they affect. Such description must be included in the LEGAL file described in Section 3.4 and must be included with all distributions of the Source Code. Except to the extent prohibited by statute or regulation, such description must be sufficiently detailed for a recipient of ordinary skill to be able to understand it. </P><B>
<P>5. Trademark Usage. </P></B><B>
<P>5.1. Advertising Materials. </B>All advertising materials mentioning features or use of the Governed Code must display the following acknowledgement: "This product includes software developed by Ricoh Silicon Valley, Inc."</P><B>
<P>5.2. Endorsements. </B>The names "Ricoh," "Ricoh Silicon Valley," and "RSV" must not be used to endorse or promote Contributor Versions or Larger Works without the prior written permission of RSV.</P><B>
<P>5.3. Product Names. </B>Contributor Versions and Larger Works may not be called "Ricoh" nor may the word "Ricoh" appear in their names without the prior written permission of RSV.</P><B>
<P>6. Versions of the License. </P></B><B>
<P>6.1. New Versions. </B>RSV may publish revised and/or new versions of the License from time to time. Each version will be given a distinguishing version number. </P><B>
<P>6.2. Effect of New Versions. </B>Once Governed Code has been published under a particular version of the License, You may always continue to use it under the terms of that version. You may also choose to use such Governed Code under the terms of any subsequent version of the License published by RSV. No one other than RSV has the right to modify the terms applicable to Governed Code created under this License. </P><B>
<P>7. Disclaimer of Warranty. </P></B>
<P>GOVERNED CODE IS PROVIDED UNDER THIS LICENSE ON AN "AS IS" BASIS, WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, WITHOUT LIMITATION, WARRANTIES THAT THE GOVERNED CODE IS FREE OF DEFECTS, MERCHANTABLE, FIT FOR A PARTICULAR PURPOSE OR NON-INFRINGING. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE GOVERNED CODE IS WITH YOU. SHOULD ANY GOVERNED CODE PROVE DEFECTIVE IN ANY RESPECT, YOU (NOT RSV OR ANY OTHER CONTRIBUTOR) ASSUME THE COST OF ANY NECESSARY SERVICING, REPAIR OR CORRECTION. THIS DISCLAIMER OF WARRANTY CONSTITUTES AN ESSENTIAL PART OF THIS LICENSE. NO USE OF ANY GOVERNED CODE IS AUTHORIZED HEREUNDER EXCEPT UNDER THIS DISCLAIMER. </P><B>
<P>8. Termination. </P></B><B>
<P>8.1.</B> This License and the rights granted hereunder will terminate automatically if You fail to comply with terms herein and fail to cure such breach within 30 days of becoming aware of the breach. All sublicenses to the Governed Code which are properly granted shall survive any termination of this License. Provisions which, by their nature, must remain in effect beyond the termination of this License shall survive.</P><B>
<P>8.2.</B> If You initiate patent infringement litigation against RSV or a Contributor (RSV or the Contributor against whom You file such action is referred to as "Participant") alleging that: </P>
<DIR>
<DIR>
<P>(a) such Participant\'s Original Code or Contributor Version directly or indirectly infringes any patent, then any and all rights granted by such Participant to You under Sections 2.1 and/or 2.2 of this License shall, upon 60 days notice from Participant terminate prospectively, unless if within 60 days after receipt of notice You either: (i) agree in writing to pay Participant a mutually agreeable reasonable royalty for Your past and future use of the Original Code or the Modifications made by such Participant, or (ii) withdraw Your litigation claim with respect to the Original Code or the Contributor Version against such Participant. If within 60 days of notice, a reasonable royalty and payment arrangement are not mutually agreed upon in writing by the parties or the litigation claim is not withdrawn, the rights granted by Participant to You under Sections 2.1 and/or 2.2 automatically terminate at the expiration of the 60 day notice period specified above. </P>
<P>(b) any software, hardware, or device provided to You by the Participant, other than such Participant\'s Original Code or Contributor Version, directly or indirectly infringes any patent, then any rights granted to You by such Participant under Sections 2.1(b) and 2.2(b) are revoked effective as of the date You first made, used, sold, distributed, or had made, Original Code or the Modifications made by that Participant. </P></DIR></DIR><B>
<P>8.3.</B> If You assert a patent infringement claim against Participant alleging that such Participant\'s Original Code or Contributor Version directly or indirectly infringes any patent where such claim is resolved (such as by license or settlement) prior to the initiation of patent infringement litigation, then the reasonable value of the licenses granted by such Participant under Sections 2.1 or 2.2 shall be taken into account in determining the amount or value of any payment or license. </P><B>
<P>8.4.</B> In the event of termination under Sections 8.1 or 8.2 above, all end user license agreements (excluding distributors and resellers) which have been validly granted by You or any distributor hereunder prior to termination shall survive termination. </P><B>
<P>9. Limitation of Liability. </P></B>
<P>UNDER NO CIRCUMSTANCES AND UNDER NO LEGAL THEORY, WHETHER TORT (INCLUDING NEGLIGENCE), CONTRACT, OR OTHERWISE, SHALL RSV, ANY CONTRIBUTOR, OR ANY DISTRIBUTOR OF GOVERNED CODE, OR ANY SUPPLIER OF ANY OF SUCH PARTIES, BE LIABLE TO YOU OR ANY OTHER PERSON FOR ANY DIRECT, INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY CHARACTER INCLUDING, WITHOUT LIMITATION, DAMAGES FOR LOSS OF GOODWILL, WORK STOPPAGE, COMPUTER FAILURE OR MALFUNCTION, OR ANY AND ALL OTHER COMMERCIAL DAMAGES OR LOSSES, EVEN IF SUCH PARTY SHALL HAVE BEEN INFORMED OF THE POSSIBILITY OF SUCH DAMAGES. THIS LIMITATION OF LIABILITY SHALL NOT APPLY TO LIABILITY FOR DEATH OR PERSONAL INJURY RESULTING FROM SUCH PARTY\'S NEGLIGENCE TO THE EXTENT APPLICABLE LAW PROHIBITS SUCH LIMITATION. SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THAT EXCLUSION AND LIMITATION MAY NOT APPLY TO YOU. TO THE EXTENT THAT ANY EXCLUSION OF DAMAGES ABOVE IS NOT VALID, YOU AGREE THAT IN NO EVENT WILL RSVS LIABILITY UNDER OR RELATED TO THIS AGREEMENT EXCEED FIVE THOUSAND DOLLARS ($5,000). THE GOVERNED CODE IS NOT INTENDED FOR USE IN CONNECTION WITH ANY NUCLER, AVIATION, MASS TRANSIT OR MEDICAL APPLICATION OR ANY OTHER INHERENTLY DANGEROUS APPLICATION THAT COULD RESULT IN DEATH, PERSONAL INJURY, CATASTROPHIC DAMAGE OR MASS DESTRUCTION, AND YOU AGREE THAT NEITHER RSV NOR ANY CONTRIBUTOR SHALL HAVE ANY LIABILITY OF ANY NATURE AS A RESULT OF ANY SUCH USE OF THE GOVERNED CODE. </P><B>
<P>10. U.S. Government End Users. </P></B>
<P>The Governed Code is a "commercial item," as that term is defined in 48 C.F.R. 2.101 (Oct. 1995), consisting of "commercial computer software" and "commercial computer software documentation," as such terms are used in 48 C.F.R. 12.212 (Sept. 1995). Consistent with 48 C.F.R. 12.212 and 48 C.F.R. 227.7202-1 through 227.7202-4 (June 1995), all U.S. Government End Users acquire Governed Code with only those rights set forth herein. </P><B>
<P>11. Miscellaneous. </P></B>
<P>This License represents the complete agreement concerning subject matter hereof. If any provision of this License is held to be unenforceable, such provision shall be reformed only to the extent necessary to make it enforceable. This License shall be governed by California law provisions (except to the extent applicable law, if any, provides otherwise), excluding its conflict-of-law provisions. The parties submit to personal jurisdiction in California and further agree that any cause of action arising under or related to this Agreement shall be brought in the Federal Courts of the Northern District of California, with venue lying in Santa Clara County, California. The losing party shall be responsible for costs, including without limitation, court costs and reasonable attorneys fees and expenses. Notwithstanding anything to the contrary herein, RSV may seek injunctive relief related to a breach of this Agreement <FONT size=3>in any court of competent jurisdiction. </FONT>The application of the United Nations Convention on Contracts for the International Sale of Goods is expressly excluded. Any law or regulation which provides that the language of a contract shall be construed against the drafter shall not apply to this License. </P><B>
<P>12. Responsibility for Claims. </P></B>
<P>Except in cases where another Contributor has failed to comply with Section 3.4, You are responsible for damages arising, directly or indirectly, out of Your utilization of rights under this License, based on the number of copies of Governed Code you made available, the revenues you received from utilizing such rights, and other relevant factors. You agree to work with affected parties to distribute responsibility on an equitable basis. </P><B>
<P align=center>&nbsp;</P>
<P align=center>EXHIBIT A</P></B>
<P>"The contents of this file are subject to the Ricoh Source Code Public License Version 1.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at <U><FONT color=#0000ff>http://www.risource.org/RPL</P></U></FONT>
<P>Software distributed under the License is distributed on an "AS IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for the specific language governing rights and limitations under the License. </P>
<P>This code was initially developed by Ricoh Silicon Valley, Inc. Portions created by Ricoh Silicon Valley, Inc. are Copyright (C) 1995-1999. All Rights Reserved.</P>
<P>Contributor(s): ______________________________________."</P></TT>',
),
181 => 
array (
'license_list_pk' => 182,
'wts_key' => 0,
'license_identifier' => 'Ruby',
'license_fullname' => 'Ruby License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
182 => 
array (
'license_list_pk' => 183,
'wts_key' => 0,
'license_identifier' => 'SAX-PD',
'license_fullname' => 'Sax Public Domain Notice',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
183 => 
array (
'license_list_pk' => 184,
'wts_key' => 0,
'license_identifier' => 'SGI-B-1.0',
'license_fullname' => 'SGI Free Software License B v1.0',
'license_matchname_1' => 'SGI-B',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
184 => 
array (
'license_list_pk' => 185,
'wts_key' => 0,
'license_identifier' => 'SGI-B-1.1',
'license_fullname' => 'SGI Free Software License B v1.1',
'license_matchname_1' => 'SGI-B1.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
185 => 
array (
'license_list_pk' => 186,
'wts_key' => 0,
'license_identifier' => 'SGI-B-2.0',
'license_fullname' => 'SGI Free Software License B v2.0',
'license_matchname_1' => 'SGI-B2.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
186 => 
array (
'license_list_pk' => 187,
'wts_key' => 0,
'license_identifier' => 'OFL-1.0',
'license_fullname' => 'SIL Open Font License 1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
187 => 
array (
'license_list_pk' => 188,
'wts_key' => 0,
'license_identifier' => 'OFL-1.1',
'license_fullname' => 'SIL Open Font License 1.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
188 => 
array (
'license_list_pk' => 189,
'wts_key' => 0,
'license_identifier' => 'SimPL-2.0',
'license_fullname' => 'Simple Public License 2.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
189 => 
array (
'license_list_pk' => 190,
'wts_key' => 42,
'license_identifier' => 'Sleepycat',
'license_fullname' => 'Sleepycat License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1>The Sleepycat License</H1>
<P>Copyright (c) 1990-1999 Sleepycat Software. All rights reserved.</P>
<P>Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:</P>
<UL>
<LI>Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer. 
<LI>Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution. 
<LI>Redistributions in any form must be accompanied by information on how to obtain complete source code for the DB software and any accompanying software that uses the DB software. The source code must either be included in the distribution or be available for no more than the cost of distribution plus a nominal fee, and must be freely redistributable under reasonable conditions. For an executable file, complete source code means the source code for all modules it contains. It does not include source code for modules or files that typically accompany the major components of the operating system on which the executable file runs. </LI></UL>
<P>THIS SOFTWARE IS PROVIDED BY SLEEPYCAT SOFTWARE ``AS IS\'\' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT, ARE DISCLAIMED. IN NO EVENT SHALL SLEEPYCAT SOFTWARE BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</P>
<HR>

<P>Copyright (c) 1990, 1993, 1994, 1995 The Regents of the University of California. All rights reserved.</P>
<P>Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:</P>
<UL>
<LI>Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer. 
<LI>Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution. 
<LI>Neither the name of the University nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission. </LI></UL>
<P>THIS SOFTWARE IS PROVIDED BY THE REGENTS AND CONTRIBUTORS ``AS IS\'\' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</P>
<HR>

<P>Copyright (c) 1995, 1996 The President and Fellows of Harvard University. All rights reserved.</P>
<P>Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:</P>
<UL>
<LI>Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer. 
<LI>Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution. 
<LI>Neither the name of the University nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission. </LI></UL>
<P>THIS SOFTWARE IS PROVIDED BY HARVARD AND ITS CONTRIBUTORS ``AS IS\'\' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL HARVARD OR ITS CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</P>',
),
190 => 
array (
'license_list_pk' => 191,
'wts_key' => 0,
'license_identifier' => 'SMLNJ',
'license_fullname' => 'Standard ML of New Jersey License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
191 => 
array (
'license_list_pk' => 192,
'wts_key' => 0,
'license_identifier' => 'SugarCRM-1.1.3',
'license_fullname' => 'SugarCRM Public License v1.1.3',
'license_matchname_1' => 'SugarCRM',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
192 => 
array (
'license_list_pk' => 193,
'wts_key' => 0,
'license_identifier' => 'SISSL',
'license_fullname' => 'Sun Industry Standards Source License',
'license_matchname_1' => 'SISSL',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
193 => 
array (
'license_list_pk' => 194,
'wts_key' => 0,
'license_identifier' => 'SPL-1.0',
'license_fullname' => 'Sun Public License v1.0',
'license_matchname_1' => 'SunPL1.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
194 => 
array (
'license_list_pk' => 195,
'wts_key' => 0,
'license_identifier' => 'Watcom-1.0',
'license_fullname' => 'Sybase Open Watcom Public License 1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
195 => 
array (
'license_list_pk' => 196,
'wts_key' => 46,
'license_identifier' => 'NCSA',
'license_fullname' => 'University of Illinois/NCSA Open Source License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1>University of Illinois/NCSA Open Source License</H1>
<P><PRE>Copyright (c) &lt;Year&gt; &lt;Owner Organization Name&gt; 
All rights reserved.<BR>
Developed by: 		&lt;Name of Development Group&gt;
&lt;Name of Institution&gt;
&lt;URL for Development Group/Institution&gt;
</PRE>
<P>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal with the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions: 
<UL>
<LI>Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimers. 
<LI>Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimers in the documentation and/or other materials provided with the distribution. 
<LI>Neither the names of &lt;Name of Development Group, Name of Institution&gt;, nor the names of its contributors may be used to endorse or promote products derived from this Software without specific prior written permission. </LI></UL>
<P>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE CONTRIBUTORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS WITH THE SOFTWARE. </P>',
),
196 => 
array (
'license_list_pk' => 197,
'wts_key' => 0,
'license_identifier' => 'VSL-1.0',
'license_fullname' => 'Vovida Software License v1.0',
'license_matchname_1' => 'Vovida',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
197 => 
array (
'license_list_pk' => 198,
'wts_key' => 0,
'license_identifier' => 'W3C',
'license_fullname' => 'W3C Software and Notice License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
198 => 
array (
'license_list_pk' => 199,
'wts_key' => 0,
'license_identifier' => 'WXwindows',
'license_fullname' => 'wxWindows Library License',
'license_matchname_1' => 'wxWindows',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
199 => 
array (
'license_list_pk' => 200,
'wts_key' => 50,
'license_identifier' => 'Xnet',
'license_fullname' => 'X.Net License',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '<H1>The X.Net, Inc. License</H1><TT>
<P>Copyright (c) 2000-2001 X.Net, Inc. Lafayette, California, USA</P>
<P>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</P>
<P>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</P>
<P>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</P>
<P>This agreement shall be governed in all respects by the laws of the State of California and by the laws of the United States of America.</P></TT>',
),
200 => 
array (
'license_list_pk' => 201,
'wts_key' => 0,
'license_identifier' => 'XFree86-1.1',
'license_fullname' => 'XFree86 License 1.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
201 => 
array (
'license_list_pk' => 202,
'wts_key' => 0,
'license_identifier' => 'YPL-1.0',
'license_fullname' => 'Yahoo! Public License v1.0',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
202 => 
array (
'license_list_pk' => 203,
'wts_key' => 0,
'license_identifier' => 'YPL-1.1',
'license_fullname' => 'Yahoo! Public License v1.1',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
203 => 
array (
'license_list_pk' => 204,
'wts_key' => 0,
'license_identifier' => 'Zimbra-1.3',
'license_fullname' => 'Zimbra Public License v1.3',
'license_matchname_1' => '',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
204 => 
array (
'license_list_pk' => 205,
'wts_key' => 0,
'license_identifier' => 'Zlib',
'license_fullname' => 'zlib License',
'license_matchname_1' => 'ZLib',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
205 => 
array (
'license_list_pk' => 206,
'wts_key' => 0,
'license_identifier' => 'ZPL-1.1',
'license_fullname' => 'Zope Public License 1.1',
'license_matchname_1' => 'ZPL1.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
206 => 
array (
'license_list_pk' => 207,
'wts_key' => 0,
'license_identifier' => 'ZPL-2.0',
'license_fullname' => 'Zope Public License 2.0',
'license_matchname_1' => 'ZPL2.0',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
207 => 
array (
'license_list_pk' => 208,
'wts_key' => 0,
'license_identifier' => 'ZPL-2.1',
'license_fullname' => 'Zope Public License 2.1',
'license_matchname_1' => 'ZPL2.1',
'license_matchname_2' => '',
'license_matchname_3' => '',
'license_text' => '',
),
));
	}

}
