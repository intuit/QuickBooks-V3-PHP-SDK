<?xml version="1.0" encoding="UTF-8"?>
	<!--
		Copyright 2010 Mike Bevz <myb@mikebevz.com> Licensed under the Apache
		License, Version 2.0 (the "License"); you may not use this file except
		in compliance with the License. You may obtain a copy of the License
		at http://www.apache.org/licenses/LICENSE-2.0 Unless required by
		applicable law or agreed to in writing, software distributed under the
		License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
		CONDITIONS OF ANY KIND, either express or implied. See the License for
		the specific language governing permissions and limitations under the
		License.
	-->
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
	xmlns:exslt="http://exslt.org/common">
	
	<xsl:variable name="targetNamespace" select="@targetNamespace" />

	<xsl:template
		match="//*[local-name()='schema' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">

		<!-- Generate classes for each element with data type as extention -->
		<xsdschema>
			<classes>

				<xsl:for-each
					select="*[local-name()='element' and
					namespace-uri()='http://www.w3.org/2001/XMLSchema']">
					<xsl:choose>
						<xsl:when test="@namespace">
							<class debug="1.0" name="{@name}" namespace="{@namespace}">
								<extends debug="1.0Extend" name="{@type}" />
								<xsl:apply-templates />
							</class>
						</xsl:when>
						<xsl:when test="*[local-name='complexType']/@name=''">
							<class debug="1.2" name="{@name}" namespace="{@namespace}">
								<extends debug="1.0Extend" name="{@type}" />
								<xsl:apply-templates />
							</class>
						</xsl:when>
						<xsl:otherwise>
							<xsl:choose>
								<xsl:when test="contains(@type, ':')">
									<class debug="1.1" name="{@name}" type="{substring-after(@type,':')}"
										namespace="{$targetNamespace}">
										<extends debug="1.1Extend" name="{substring-after(@type,':')}"
											namespace="{substring-before(@type,':')}" />
										<xsl:apply-templates />
									</class>
								</xsl:when>
								<xsl:otherwise>
									<class debug="1.1-1" name="{@name}" type="{@type}"
										namespace="{$targetNamespace}">
										<extends debug="1.2Extend" name="{@type}" />
										<xsl:apply-templates />
									</class>
								</xsl:otherwise>
							</xsl:choose>



						</xsl:otherwise>
					</xsl:choose>
				</xsl:for-each>

				<xsl:for-each
					select="*[local-name()='complexType' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
					<xsl:variable name="classSimpleType"
						select="substring-after(current()/*[local-name()='simpleContent']/*[local-name()='extension']/@base, ':')" />
					<xsl:variable name="classSimpleTypeNs"
						select="substring-before(current()/*[local-name()='simpleContent']/*[local-name()='extension']/@base, ':')" />
					<xsl:choose>
						<xsl:when test="@namespace">

							<class debug="1.2-1" name="{@name}" type="{$classSimpleType}"
								typeNamespace="{$classSimpleTypeNs}" namespace="{@namespace}">
								<xsl:apply-templates />
							</class>
						</xsl:when>
						<xsl:otherwise>
							<class debug="1.2-2" name="{@name}" type="{$classSimpleType}"
								typeNamespace="{$classSimpleTypeNs}" namespace="{$targetNamespace}">
								<xsl:apply-templates />
							</class>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:for-each>

				<xsl:for-each
					select="//*[local-name()='simpleType' and
					namespace-uri()='http://www.w3.org/2001/XMLSchema']">
					<xsl:variable name="type"
						select="substring-after(current()/*[local-name()='restriction']/@base,
					':')" />
					<xsl:choose>
						<xsl:when test="@namespace">
							<class debug="1.3-1" name="{@name}" type="{$type}"
								namespace="{@namespace}">
								<xsl:apply-templates
									select="*[local-name()='annotation' and
					namespace-uri()='http://www.w3.org/2001/XMLSchema']" />
							</class>
						</xsl:when>
						<xsl:otherwise>
							<class debug="1.3-2 - ERROR No
					Namespace" name="{@name}"
								type="{$type}" namespace="{@namespace}">
								<xsl:apply-templates
									select="*[local-name()='annotation' and
					namespace-uri()='http://www.w3.org/2001/XMLSchema']" />

                <xsl:for-each
					select="*[local-name()='restriction' and
					namespace-uri()='http://www.w3.org/2001/XMLSchema']">
                  <xsl:apply-templates
                 select="*[local-name()='enumeration' and namespace-uri()='http://www.w3.org/2001/XMLSchema']" />
                </xsl:for-each>
               
							</class>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:for-each>




			</classes>
		</xsdschema>

	</xsl:template>


	<!-- Annotation -->
	<xsl:template
		match="*[local-name()='annotation' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<docs>
			<xsl:apply-templates />
		</docs>
	</xsl:template>

	<!-- Sequence -->
	<xsl:template
		match="*[local-name()='sequence' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<xsl:apply-templates />
	</xsl:template>

	<!-- any -->
	<xsl:template
		match="*[local-name()='any' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<any name="{local-name()}" />
		<xsl:apply-templates />
	</xsl:template>

	<!-- element -->
	<xsl:template
		match="*[local-name()='element' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<xsl:choose>
			<xsl:when test="contains(@ref,':')">
				<property debug="refElement" xmlType="element"
					name="{substring-after(@ref,':')}" type="{substring-after(@ref,':')}"
					namespace="{substring-before(@ref,':')}" minOccurs="{@minOccurs}"
					maxOccurs="{@maxOccurs}">
					<xsl:apply-templates />
				</property>
			</xsl:when>
			<xsl:when test="@ref and not(contains(@ref,':'))">
				<xsl:choose>
					<xsl:when test="../../@namespace">
						<property debug="refElement-ParentNS" xmlType="element"
							name="{@ref}" type="{@ref}" minOccurs="{@minOccurs}" namespace="{../../@namespace}"
							maxOccurs="{@maxOccurs}">
							<xsl:apply-templates />
						</property>
					</xsl:when>
					<xsl:otherwise>
						<property debug="refElement-NoNS" xmlType="element" name="{@ref}"
							type="{@ref}" minOccurs="{@minOccurs}" maxOccurs="{@maxOccurs}">
							<xsl:apply-templates />
						</property>
					</xsl:otherwise>
				</xsl:choose>
			</xsl:when>
			<xsl:when test="@name">
				<xsl:choose>
					<xsl:when test="contains(@type, ':')">
						<xsl:choose>
							<xsl:when test="../../@namespace">
								<property debug="nameElement-TypeColonNamespace"
									xmlType="element" name="{@name}" type="{substring-after(@type, ':')}"
									namespace="{../../@namespace}" minOccurs="{@minOccurs}"
									typeNamespace="{substring-before(@type, ':')}" maxOccurs="{@maxOccurs}">
									<xsl:apply-templates />
								</property>
							</xsl:when>
							<xsl:otherwise>
								<property debug="nameElement-TypeColonNoNamespace"
									xmlType="element" name="{@name}" type="{substring-after(@type, ':')}"
									namespace="#default#" minOccurs="{@minOccurs}"
									typeNamespace="{substring-before(@type, ':')}" maxOccurs="{@maxOccurs}">
									<xsl:apply-templates />
								</property>
							</xsl:otherwise>
						</xsl:choose>
					</xsl:when>
					<xsl:otherwise>
						<property debug="nameElement-TypeNoColon" xmlType="element"
							name="{@name}" type="{@type}" namespace="#default#"
							typeNamespace="#default#" minOccurs="{@minOccurs}" maxOccurs="{@maxOccurs}">
							<xsl:apply-templates />
						</property>

					</xsl:otherwise>
				</xsl:choose>
			</xsl:when>

		</xsl:choose>
	</xsl:template>

	<!-- restriction -->
	<xsl:template
		match="*[local-name()='restriction' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<xsl:if test="@base">
			<xsl:choose>
				<xsl:when test="contains(@base, ':')">
					<extends debug="CollonBase" name="{substring-after(@base,':')}"
						namespace="{substring-before(@base,':')}" />
				</xsl:when>
				<xsl:otherwise>
					<extends debug="NoCollonBase" name="{@base}" namespace="{$targetNamespace}" />
				</xsl:otherwise>
			</xsl:choose>
		</xsl:if>
		<xsl:apply-templates />
	</xsl:template>

	<!-- enumeration -->
	<xsl:template match="//*[local-name()='enumeration' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
                         <const value ="{@value}" />
                         <xsl:apply-templates />
        </xsl:template>
        
        <!-- Simplecontent -->
	<xsl:template
		match="*[local-name()='simpleContent' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<xsl:apply-templates />
	</xsl:template>

	<xsl:template
		match="*[local-name()='extension' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<xsl:if test="@base">
			<!--
				@todo Crappy: Checking if the @base namespace is XMLSchema. it slows
				down everything so bad. Will be using 'xsd' for check now, improve
				in future
			-->
			<xsl:variable name="nspace" select="substring-before(@base,':')" />
			<xsl:if test="$nspace!='xsd'">


				<xsl:choose>
					<xsl:when test="contains(@base, ':')">
						<extends debug="Extends3" name="{substring-after(@base,':')}"
							namespace="{substring-before(@base,':')}" />
						<xsl:apply-templates />
					</xsl:when>
					<xsl:otherwise>
						<!-- Not sure about namespace here... -->
						<extends debug="Extends4" name="{@base}" namespace="{@base}" />
						<xsl:apply-templates />
					</xsl:otherwise>
				</xsl:choose>
			</xsl:if>
			<xsl:if test="$nspace='xsd'">
				<xsl:apply-templates />
			</xsl:if>

		</xsl:if>

	</xsl:template>

	<!-- Attribute -->

	<xsl:template
		match="*[local-name()='attribute' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<xsl:choose>
			<xsl:when test="@name">
				<xsl:choose>
					<xsl:when test="contains(@type, ':')">
						<property debug="attribute-TypeNs" xmlType="attribute" name="{@name}"
							type="{substring-after(@type, ':')}" typeNamespace="{substring-before(@type, ':')}" default="{@default}" use="{@use}">
							<xsl:apply-templates />
						</property>
					</xsl:when>
					<xsl:otherwise>
                        <property debug="attribute-TypeNoNs" xmlType="attribute" name="{@name}"
                            type="{@type}"  default="{@default}" use="{@use}">
                            <xsl:apply-templates />
                        </property>
					</xsl:otherwise>

				</xsl:choose>

			</xsl:when>
			<xsl:when test="@ref">
				<xsl:variable name="attRef"
					select="//*[local-name()='attribute' and namespace-uri()='http://www.w3.org/2001/XMLSchema'][@name=current()/@ref]/@type" />
				<xsl:choose>
					<xsl:when test="contains($attRef, ':')">
						<property debug="attribute-Ref-1" xmlType="attribute"
							name="{@ref}" type="{substring-after($attRef,':')}" namespace="{substring-before($attRef,':')}"
							default="{@default}" use="{@use}">
						</property>
					</xsl:when>
					<xsl:otherwise>
						<property debug="attribute-Ref-2" xmlType="attribute"
							name="{@ref}" type="{$attRef}" default="{@default}" use="{@use}">
						</property>
					</xsl:otherwise>
				</xsl:choose>

			</xsl:when>
			<!-- @todo otherwise -->
		</xsl:choose>
	</xsl:template>

	<!-- Documentation -->
	<xsl:template
		match="*[local-name()='documentation' and namespace-uri()='http://www.w3.org/2001/XMLSchema']">
		<xsl:choose>
			<xsl:when test="child::*">
				<xsl:for-each select="child::*">
					<xsl:choose>
						<xsl:when test="local-name()='Component'">
							<xsl:for-each select="child::*">
								<doc name="{local-name()}">
									<xsl:value-of select="current()" />
								</doc>
							</xsl:for-each>
						</xsl:when>
						<xsl:otherwise>
							<doc name="{local-name()}">
								<xsl:value-of select="current()" />
							</doc>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:for-each>
			</xsl:when>
			<xsl:otherwise>
				<doc name="Definition">
					<xsl:value-of select="current()" />
				</doc>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>

</xsl:stylesheet>