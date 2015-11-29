<?php

$str = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<idPkg:Story xmlns:idPkg="http://ns.adobe.com/AdobeInDesign/idml/1.0/packaging" DOMVersion="8.0">
	<Story Self="udc" AppliedTOCStyle="n" TrackChanges="false" StoryTitle="$ID/" AppliedNamedGrid="n">
		<StoryPreference OpticalMarginAlignment="false" OpticalMarginSize="12" FrameType="TextFrameType" StoryOrientation="Horizontal" StoryDirection="LeftToRightDirection" />
		<InCopyExportOption IncludeGraphicProxies="true" IncludeAllResources="false" />
		<XMLElement Self="di2i3" MarkupTag="XMLTag/dynamic_content" XMLContent="udc">
			<ParagraphStyleRange AppliedParagraphStyle="ParagraphStyle/$ID/NormalParagraphStyle" Justification="CenterAlign">
				<CharacterStyleRange AppliedCharacterStyle="CharacterStyle/$ID/[No character style]">
					<Properties>
						<AppliedFont type="string">Arial</AppliedFont>
					</Properties>
					<Content>Hello world</Content>
					<Br />
					<Content>Second </Content>
				</CharacterStyleRange>
				<CharacterStyleRange AppliedCharacterStyle="CharacterStyle/$ID/[No character style]" FontStyle="Bold">
					<Properties>
						<AppliedFont type="string">Arial</AppliedFont>
					</Properties>
					<Content>line</Content>
				</CharacterStyleRange>
				<CharacterStyleRange AppliedCharacterStyle="CharacterStyle/$ID/[No character style]">
					<Properties>
						<AppliedFont type="string">Arial</AppliedFont>
					</Properties>
					<Content> of the test</Content>
				</CharacterStyleRange>
			</ParagraphStyleRange>
		</XMLElement>
	</Story>
</idPkg:Story>
';

$xmlDoc = new DOMDocument();
$xmlDoc->loadXML($str);
$paragraphStyleRanges = $xmlDoc->getElementsByTagName('ParagraphStyleRange');

$strContent = '';
/** @var DOMDocument $paragraphStyleRange */
foreach($paragraphStyleRanges as $paragraphStyleRange)
{
	$style = '';
	$justification = $paragraphStyleRange->attributes->getNamedItem('Justification')->textContent;
	switch($justification)
	{
		case 'CenterAlign':
			$style .= ' style="text-align: center"';
			break;
	}
	$strContent .= '<p'.$style.'>';
  $characterStyleRanges = $paragraphStyleRange->getElementsByTagName('CharacterStyleRange');
	/** @var DOMDocument $characterStyleRange */
	foreach($characterStyleRanges as $characterStyleRange)
	{
		$style = '';
		$fontStyle = $characterStyleRange->attributes->getNamedItem('FontStyle');
		if(isset($fontStyle))
		{
			switch($characterStyleRange->attributes->getNamedItem('FontStyle')->textContent){
				case 'Bold':
					$style = ' style="font-weight:bold"';
					break;
			}
		}

		/** @var DOMNodeList $childeren */
		$childeren = $characterStyleRange->childNodes;

		foreach($childeren as $child)
		{
			switch($child->localName)
			{
				case 'Content':
					$strContent .= '<span'.$style.'>';
					$strContent .= $child->textContent;
					$strContent .= '</span>';
					break;
				case 'Br':
					$strContent .= '<br />';
					break;
			}

		}
	}
	$strContent .= '</p>';
}

var_dump($strContent);
//var_dump($xmlDoc);