
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
	<div id="comments">
		<xsl:for-each select="post/comments/comment">
		<div class="comment">
			<div class="author" >
			<br></br>
			<b>Comment By: &#xA0;</b>	<xsl:value-of select="author"/> 
			&#xA0;&#xA0;&#xA0;&#xA0;&#xA0;<span> <xsl:value-of select="date"/></span>
				<div class="text" >
					<br></br><xsl:value-of select="body"/>
				</div>
			</div>
			<xsl:call-template name="response" />
		</div>
    	</xsl:for-each>
	</div>
</xsl:template>
<xsl:template name="response">
	<xsl:for-each select="responses/comment">
		<div  id="comRes">
			<div  >
			<br></br>
			<b>Response By: &#xA0;</b>	<xsl:value-of select="author"/>
			&#xA0;&#xA0;&#xA0;&#xA0;&#xA0;<span> <xsl:value-of select="date"/></span>
				<div  >
				<br></br>	<xsl:value-of select="body"/>
				</div>
			</div>
			<xsl:call-template name="response" />
		</div>
	</xsl:for-each>
</xsl:template>
</xsl:stylesheet>